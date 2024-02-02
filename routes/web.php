<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvanturController;
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

Route::get('/', [AdvanturController::class,'index']);

Route::get('/Destination/{sort?}', [AdvanturController::class, 'showAllAdventures'])->name('Destination');
Route::post('/filterByDestination', [AdvanturController::class, 'filterByDestination'])->name('filterByDestination');
Route::post('/Posts', [AdvanturController::class, 'store'])->name('post.store');
// Route::get('/Destination', [AdvanturController::class, 'getAllDestinations'])->name("Destination");

Route::get('/Add_Adventure', [AdvanturController::class, 'DisplayCountry'])->name('Add_Adventure');

Route::post('/submit', [AdventurController::class, 'submitAdventure']);

// Route::get([AdvanturController::class,'index']); 
