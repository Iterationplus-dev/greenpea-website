<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/apartments/{apartment}', [\App\Http\Controllers\BookingController::class, 'show']);
Route::post('/book/{apartment}', [\App\Http\Controllers\BookingController::class, 'store']);
Route::get('/booking/{booking}/pay', [\App\Http\Controllers\BookingController::class, 'pay']);

