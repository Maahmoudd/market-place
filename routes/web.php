<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/success', function () {
   return response('Payment Success');
})->name('checkout-success');
Route::get('/cancel', function () {
   return response('Payment failed');
})->name('checkout-cancel');
