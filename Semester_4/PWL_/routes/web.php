<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', function () {
    return 'Varizky Naldiba Rimra (2341720243)';
});

Route::get('/user/{Variz}', function ($Variz) {
    return 'Nama saya ' . $Variz;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

Route::get('articles/{id}', function ($articleId) {
    return 'Halaman Artikel dengan id ' . $articleId;
});

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

Route::get('/user/profile', function () {
    //
})->name('profile');

// Route group

Route::middleware(['first', 'second'])->group(function () { Route::get('/', function () {
    // Uses first & second middleware...
});
Route::get('/user/profile', function () {
// Uses first & second middleware...
});
});
Route::domain('{account}.example.com')->group(function () { Route::get('user/{id}', function ($account, $id) {
//
});
});
Route::middleware('auth')->group(function () {
Route::get('/user', [UserController::class, 'index']);
Route::get('/post', [PostController::class, 'index']);
Route::get('/event', [EventController::class, 'index']);
});

// // Route Prefixes

// Route::prefix('admin')->group(function () {
//     route('/user', [UserController::class, 'index']);
//     route('/post', [PostController::class, 'index']);
//     route('/event', [EventController::class, 'index']);
// });