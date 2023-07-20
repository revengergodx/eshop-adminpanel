<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::controller(\App\Http\Controllers\CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::get('/create', 'create')->name('category.create');
    Route::post('/', 'store')->name('category.store');
    Route::get('/{category}/edit', 'edit')->name('category.edit');
    Route::patch('/{category}/', 'update')->name('category.update');
    Route::get('/{category}', 'show')->name('category.show');
    Route::delete('/{category}', 'delete')->name('category.delete');
});

Route::controller(\App\Http\Controllers\TagController::class)->prefix('tags')->group(function () {
    Route::get('/', 'index')->name('tag.index');
    Route::get('/create', 'create')->name('tag.create');
    Route::post('/', 'store')->name('tag.store');
    Route::get('/{tag}/edit', 'edit')->name('tag.edit');
    Route::patch('/{tag}/', 'update')->name('tag.update');
    Route::get('/{tag}', 'show')->name('tag.show');
    Route::delete('/{tag}', 'delete')->name('tag.delete');
});
Route::controller(\App\Http\Controllers\ColorController::class)->prefix('colors')->group(function () {
    Route::get('/', 'index')->name('color.index');
    Route::get('/create', 'create')->name('color.create');
    Route::post('/', 'store')->name('color.store');
    Route::get('/{color}/edit', 'edit')->name('color.edit');
    Route::patch('/{color}/', 'update')->name('color.update');
    Route::get('/{color}', 'show')->name('color.show');
    Route::delete('/{color}', 'delete')->name('color.delete');
});
Route::controller(\App\Http\Controllers\UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/create', 'create')->name('user.create');
    Route::post('/', 'store')->name('user.store');
    Route::get('/{user}/edit', 'edit')->name('user.edit');
    Route::patch('/{user}/', 'update')->name('user.update');
    Route::get('/{user}', 'show')->name('user.show');
    Route::delete('/{user}', 'delete')->name('user.delete');
});
Route::controller(\App\Http\Controllers\ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::patch('/{product}/', 'update')->name('product.update');
    Route::get('/{product}', 'show')->name('product.show');
    Route::delete('/{product}', 'delete')->name('product.delete');
});
Route::controller(\App\Http\Controllers\OrderController::class)->prefix('orders')->group(function () {
    Route::get('/', 'index')->name('order.index');
    Route::get('/{order}/edit', 'edit')->name('order.edit');
    Route::patch('/{order}/', 'update')->name('order.update');
    Route::get('/{order}', 'show')->name('order.show');
    Route::delete('/{order}', 'delete')->name('order.delete');
});


