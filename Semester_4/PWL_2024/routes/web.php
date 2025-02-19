<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/world', function () {
//     return 'World';
// });

// Route::get('/about', function () {
//     return 'Varizky Naldiba Rimra (2341720243)';
// });

// Route::get('/user/{Variz}', function ($Variz) {
//     return 'Nama saya ' . $Variz;
// });

// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
// });

Route::get('articles/{id}', function ($articleId) {
    return 'Halaman Artikel dengan id ' . $articleId;
});

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

// Route::get('/user/{name?}', function ($name = 'John') {
//     return 'Nama saya ' . $name;
// });

// Route::get('/user/profile', function () {
//     //
// })->name('profile');

Route::get('/user', function () {
    return 'Halaman User';
});

Route::redirect('/here', '/there');

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

use App\Http\Controllers\WelcomeController;

Route::get('/hello', [WelcomeController::class, 'hello']);

use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'about']);

use App\Http\Controllers\ArticleController;

Route::get('/article/{id}', [ArticleController::class, 'Article']);

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'home']);

use App\Http\Controllers\PhotoController;

Route::get('/photos', [PhotoController::class, 'index']);

Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);

// Route::resource('photos', PhotoController::class)->except([
//     'create',
//     'store',
//     'update',
//     'destroy'
// ]);


// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Andi']);
//     });