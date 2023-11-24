<?php

use App\Http\Controllers\Api\HomeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/dogs', [HomeController::class, 'getDogs']);
Route::get('/dogs/{numberdogs}', [HomeController::class, 'getDogsByNumber']);

Route::post('/create/dog', [HomeController::class, 'createDog']);
