<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // tambah data user dengan Eloquent Model
        $data = [
            'username' => 'manager_tiga',
            'level_id' => 2,
            'password' => Hash::make('12345'),
            'nama' => 'Manager 3'

            // 'nama'=>'Pelanggan Pertama',
        ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        UserModel::create($data);

        // UserModel::where('username', 'customer-1')->update($data);

        // coba akses model UserModel

        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}