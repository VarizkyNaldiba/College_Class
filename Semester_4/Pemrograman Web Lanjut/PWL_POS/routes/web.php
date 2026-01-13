<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;



Route::pattern('id','[0-9]+');

route::get('login', [AuthController::class, 'login'])->name('login');
route::post('postlogin', [AuthController::class, 'postlogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

route::middleware('auth')->group(function () {
                                                                                                    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/', [WelcomeController::class, 'index']);

    
    
    route::middleware(['authorize:Adm'])->group(function() {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);        // menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables

        
            // ajax
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru Ajax
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // untuk menghapus data user Ajax
        });
    });
    

    route::middleware(['authorize:Pgw,Adm'])->group(function() {
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);        // Menampilkan daftar level
            Route::post('/list', [LevelController::class, 'list']);    // Menampilkan data level dalam JSON untuk datatables
        
            // ajax
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah Level Ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']); // menyimpan data Level baru Ajax
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit Level Ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data Level Ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete Level Ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // untuk menghapus data Level Ajax
        });
    });
    
    route::middleware(['authorize:Pgw,Adm'])->group(function() {
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);        // Menampilkan daftar kategori
        Route::post('/list', [KategoriController::class, 'list']);    // Menampilkan data kategori dalam JSON untuk datatables
    
        // ajax
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // Menampilkan halaman form tambah Kategori Ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data Kategori baru Ajax
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // Menampilkan halaman form edit Kategori Ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data Kategori Ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete Kategori Ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // untuk menghapus data Kategori Ajax
    });
    
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/', [BarangController::class, 'index']);        // Menampilkan daftar Barang
        Route::post('/list', [BarangController::class, 'list']);    // Menampilkan data Barang dalam JSON untuk datatables
        
        // ajax
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah Barang Ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data Barang baru Ajax
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit Barang Ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data Barang Ajax
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete Barang Ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // untuk menghapus data Barang Ajax

        Route::get('/import',[BarangController::class,'import']);    
        Route::post('/import_ajax',[BarangController::class,'import_ajax']);
        Route::get('/export_excel',[BarangController::class,'export_excel']);
        Route::get('/export_pdf',[BarangController::class,'export_pdf']);

    
    
});

    // Supplier Routes
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/list', [SupplierController::class, 'list']);
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    });

    // Stok Routes
    Route::group(['prefix' => 'stok'], function () {
        Route::get('/', [StokController::class, 'index']);
        Route::post('/list', [StokController::class, 'list']);
        Route::get('/create_ajax', [StokController::class, 'create_ajax']);
        Route::post('/ajax', [StokController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
    });

    // Penjualan Routes
    Route::group(['prefix' => 'penjualan'], function () {
        Route::get('/', [PenjualanController::class, 'index']);
        Route::post('/list', [PenjualanController::class, 'list']);
        Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);
        Route::post('/ajax', [PenjualanController::class, 'store_ajax']);
        Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
        Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
    });

});
});

    // Form Registrasi
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register/save', [AuthController::class, 'register_save'])->name('register.save');

    // Profilw
        Route::post('/profile/update-avatar', [App\Http\Controllers\ProfileController::class, 'updateAvatar']);
 

    


