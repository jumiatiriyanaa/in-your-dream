<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PackageController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\GalleriesController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/regis', [AuthController::class, 'register']);

Route::get('/profile/{id}', [ProfileController::class, 'getProfile']);
Route::post('/update-profile', [ProfileController::class, 'updateProfile']);

Route::get('/galleries', [GalleriesController::class, 'index']);
Route::get('/galleries/{name}', [GalleriesController::class, 'indexByname']);

Route::get('/package', [PackageController::class, 'index']);
