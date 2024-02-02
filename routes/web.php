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

Route::get('/Add_Adventure', function () {
    return view('Add_Adventure');
})->name('Add_Adventure');
Route::post('/submit', [AdventurController::class, 'submitAdventure']);

// Route::get([AdvanturController::class,'index']); 
