<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_see_livewire_profile_component_on_profile_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->withoutExceptionHandling()
            ->get('/profile')
            ->assertSuccessful()
            ->assertSeeLivewire('profile');
    }

    /** @test */
    function can_update_profile()
    {
        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', 'bar')
            ->call('save');

        $user->refresh();

        $this->assertEquals('foo', $user->username);
        $this->assertEquals('bar', $user->about);
    }

    /** @test */
    function can_upload_avatar()
    {
        $user = factory(User::class)->create();

        $file = UploadedFile::fake()->image('avatar.png');

        Livewire::actingAs($user)
            ->test('profile')
            ->set('newAvatar', $file)
            ->call('save');

        $user->refresh();

        $this->assertNotNull($user->avatar);
        Storage::disk('avatars')->assertExists($user->avatar);
    }

    /** @test */
    function profile_info_is_pre_populated()
    {
        $user = factory(User::class)->create([
            'username' => 'foo',
            'about' => 'bar'
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->assertSet('username', 'foo')
            ->assertSet('about', 'bar')
            ->call('save');
    }

    /** @test */
    function message_is_shown_on_save()
    {
        $user = factory(User::class)->create([
            'username' => 'foo',
            'about' => 'bar'
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->call('save')
            ->assertEmitted('notify-saved');
    }

    /** @test */
    function username_must_be_less_than_24_characters()
    {
        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', str_repeat('a', 25))
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'max']);
    }

    /** @test */
    function username_must_be_less_than_140_characters()
    {
        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', str_repeat('a', 141))
            ->call('save')
            ->assertHasErrors(['about' => 'max']);
    }
}
