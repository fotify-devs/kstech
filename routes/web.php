<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\StudentRegistration;
use App\Livewire\StudentProfile;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/student-registration', StudentRegistration::class)
        ->name('student.registration');
    
    Route::get('/student/profile', StudentProfile::class)
        ->name('student.profile');
});