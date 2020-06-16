<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function registration_page_contains_livewire_component()
    {
        $this->get('/register')->assertSeeLivewire('auth.register');
    }

    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry@example.com')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::where('email', 'larry@example.com')->exists());
        $this->assertEquals('larry@example.com', auth()->user()->email);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', '')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function email_is_a_valid_email()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    function email_hasnt_been_taken()
    {
        User::create([
            'name' => 'Larry',
            'email' => 'larry@gmail.com',
            'password' => Hash::make('secret')
        ]);

        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry@gmail.com')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function see_email_hasnt_already_been_taken_validation_message_as_user_types()
    {
        User::create([
            'name' => 'Larry',
            'email' => 'larry@gmail.com',
            'password' => Hash::make('secret')
        ]);

        Livewire::test('auth.register')
            ->set('email', 'larri@gmail.com')
            ->assertHasNoErrors()
            ->set('email', 'larry@gmail.com')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry@gmail.com')
            ->set('password', '')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    function password_has_minimum_of_six_chars()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry@gmail.com')
            ->set('password', 'secre')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }

    /** @test */
    function password_matches_password_confirmation()
    {
        Livewire::test('auth.register')
            ->set('name', 'Larry')
            ->set('email', 'larry@gmail.com')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'notsecret')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }
}
