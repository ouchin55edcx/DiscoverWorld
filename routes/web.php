<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('Welcome');

Route::get('/Destination', function () {
    return view('Destination');
})->name('Destination');

Route::get('/Add_Adventure', function () {
    return view('Add_Adventure');
})->name('Add_Adventure');
