<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::view('users', [UsersController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('users');

Volt::route('users', 'pages.users.user-table')
    ->middleware(['auth'])
    ->name('users');
require __DIR__.'/auth.php';
