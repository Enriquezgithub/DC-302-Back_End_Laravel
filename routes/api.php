<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{client}', [ClientController::class, 'view']);
Route::post('/clients', [ClientController::class, 'store']);
Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
Route::patch('/clients/{client}', [ClientController::class, 'update']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'view']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
Route::patch('/categories/{category}', [CategoryController::class, 'update']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'view']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::patch('/products/{product}', [ProductController::class, 'update']);

