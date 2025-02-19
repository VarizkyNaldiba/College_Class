<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;

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

// Halaman Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Halaman User
Route::get('/user/{id}/name/{name}', [UserController::class, 'index'])->name('user');

// Halaman Sale
Route::get('/sale', [SaleController::class, 'index'])->name('sale');

// Halaman Product
Route::get('/product', [ProductController::class, 'index'])->name('product');   

