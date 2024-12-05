<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MpesaController;

Route::view('/', 'layouts.pages.main');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

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
