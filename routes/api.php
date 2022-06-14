<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\AppartementsController;
use App\Http\Controllers\UserPublicController;
use App\Http\Controllers\VirtualTourController;
use App\Models\VirtualTour;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->apiResource("appartements", AppartementsController::class);
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("annonces", AnnoncesController::class);
Route::apiResource("virtualTour", VirtualTourController::class);
Route::apiResource("userPublic", UserPublicController::class);
//Route::apiResource("appartements", AppartementsController::class); for test only
