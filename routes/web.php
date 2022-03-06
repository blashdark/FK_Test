<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('index');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
