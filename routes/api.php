<?php

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
Route::get('/products/filters', [\App\Http\Controllers\API\FilterListController::class, 'index']);
Route::post('/products/{product}', [\App\Http\Controllers\API\ProductController::class, 'show']);
Route::post('/products', [\App\Http\Controllers\API\ProductController::class, 'index']);
Route::post('/orders', [\App\Http\Controllers\API\OrderController::class, 'store']);
