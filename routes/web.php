<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\GalleryPage;
use App\Http\Controllers\MpesaController;

Route::view('/', 'layouts.app');
Route::get('/gallery', GalleryPage::class)->name('gallery-page');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::post('/mpesa/callback', [MpesaController::class, 'handleCallback'])->name('mpesa.callback');
Route::get('/mpesa/query/{checkoutRequestId}', [MpesaController::class, 'queryTransactionStatus']);

Route::post('/mpesa/stk-push', [MpesaController::class, 'initiateSTKPush'])->name('mpesa.stk-push');