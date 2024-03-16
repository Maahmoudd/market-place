<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserProfile;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function (){
   Route::post('/register', 'register')->name('register');
   Route::post('/login', 'login')->name('login');
});

Route::middleware(['auth:sanctum', CheckUserProfile::class])
    ->prefix('users')
    ->as('user.')
    ->group(function (){
        Route::post('/logout/{user}', [AuthController::class, 'logout'])->name('logout');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::put('/{user}', [UserController::class, 'edit'])->name('edit');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth:sanctum'])
    ->controller(AdvertisementController::class)
    ->prefix('advertisements')
    ->as('advertisement.')
    ->group(function (){
   Route::post('/', 'store')->name('store');
   Route::get('/', 'index')->name('index');
   Route::get('/{advertisement}', 'show')->name('show');
   Route::put('/{advertisement}', 'edit')->name('edit');
   Route::delete('/{advertisement}', 'destroy')->name('destroy');
});
