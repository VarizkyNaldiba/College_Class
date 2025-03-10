<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index(){
    //     $users = UserModel::all(); // Ambil semua data user
    //     return view('user', ['data' => $users]);
    // }

    public function tambah() {
        return view('user_tambah'); // Pastikan file `user_tambah.blade.php` ada di folder `views`
    }

    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        if (!$user) {
            return "User tidak ditemukan";
        }
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan(Request $request){
        $user = UserModel::find($request->id);
        if (!$user) {
            return "User tidak ditemukan";
        }

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user'); 
    }

    public function hapus($id){
        $user = UserModel::find($id);
        if (!$user) {
            return "User tidak ditemukan";
        }
        
        $user->delete();
        return redirect('/user');
    }

    public function index(){
        $user = UserModel::with('level')->get();
        dd($user);
    }
}
