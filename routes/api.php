<?php

use App\Http\Controllers\Api\DogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::get('/dogs', [DogController::class, 'getDogs']);
Route::post('/dogs/filtered', [DogController::class, 'getFilteredDogs']);
Route::get('/dogs/{numberdogs}', [DogController::class, 'getDogsByNumber']);
Route::get('/races', [DogController::class, 'getRaces']);
Route::get('/numberdogs', [DogController::class, 'getNumberOfDogs']);
Route::get('/sizes', [DogController::class, 'getSizes']);

Route::post('/create/dog', [DogController::class, 'createDog']);
