<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerCatController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BreedController;
use App\Models\Owner;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('breeds', BreedController::class)->only(['update', 'store', 'destroy']);
    Route::resource('owners', OwnerController::class)->only(['store', 'destroy']);
    Route::resource('cats', CatController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('breeds', BreedController::class)->only(['index', 'show']);
Route::resource('owners', OwnerController::class)->only(['index', 'show']);
Route::resource('cats', CatController::class)->only(['index', 'show']);
Route::resource('owners.cats', OwnerCatController::class)->only(['index']);