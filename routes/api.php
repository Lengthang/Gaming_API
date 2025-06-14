<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show']);

Route::get('/developers', [DeveloperController::class, 'index']);
Route::get('/developers/{id}', [DeveloperController::class, 'show']);

Route::get('/publishers', [PublisherController::class, 'index']);
Route::get('/publishers/{id}', [PublisherController::class, 'show']);

Route::get('/platforms', [PlatformController::class, 'index']);
Route::get('/platforms/{id}', [PlatformController::class, 'show']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Game CRUD
    Route::post('/games', [GameController::class, 'store']);
    Route::put('/games/{id}', [GameController::class, 'update']);
    Route::delete('/games/{id}', [GameController::class, 'destroy']);

    // Developer CRUD
    Route::post('/developers', [DeveloperController::class, 'store']);
    Route::put('/developers/{id}', [DeveloperController::class, 'update']);
    Route::delete('/developers/{id}', [DeveloperController::class, 'destroy']);

     // Publisher CRUD
    Route::post('/publishers', [PublisherController::class, 'store']);
    Route::put('/publishers/{id}', [PublisherController::class, 'update']);
    Route::delete('/publishers/{id}', [PublisherController::class, 'destroy']);

    // Platform CRUD
    Route::post('/platforms', [PlatformController::class, 'store']);
    Route::put('/platforms/{id}', [PlatformController::class, 'update']);
    Route::delete('/platforms/{id}', [PlatformController::class, 'destroy']);
});





// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
