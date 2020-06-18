<?php

use Illuminate\Support\Facades\Route;

/**
 * App Routes
 */
Route::middleware('auth')->group(function () {
    Route::redirect('/', 'dashboard');

    Route::livewire('/dashboard', 'dashboard');
    Route::livewire('/profile', 'profile');
});

/**
 * Authentication
 */
Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth.login')->layout('layouts.auth')->name('auth.login');
    Route::livewire('/register', 'auth.register')->layout('layouts.auth')->name('auth.register');
});