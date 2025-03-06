<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // tambah data user dengan Eloquent Model
        // $data = [
            // 'username' => 'manager_tiga',
            // 'level_id' => 2,
            // 'password' => Hash::make('12345'),
            // 'nama' => 'Manager 3'

            // 'nama'=>'Pelanggan Pertama',
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        // UserModel::create($data);

        // UserModel::where('username', 'customer-1')->update($data);

        // coba akses model UserModel

        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user);
        // return view('user', ['data' => $user]);

    //     $user = UserModel::firstOrNew([
    //         'username' => 'manager 33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // $user->save();

    //     return view('user', ['data' => $user]);
// 

    // $user = UserModel::create([
    //     'username' => 'manager11',
    //     'nama' => 'Manager11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    // $user->username = 'manager11';

    // $user->save();
    
    // $user->wasChanged();
    // $user->wasChanged('username');
    // $user->wasChanged('username', 'level_id');
    // $user->wasChanged('nama');
    // $user->wasChanged('nama', 'username'); 
    
    
    // $user->isClean();
    // $user->isClean('username');
    // $user->isClean('nama');
    // $user->isClean('nama', 'username');
    

    // $user->isDirty();
    // $user->isClean();
    // dd($user->isDirty());
    // dd($user->wasChanged(['nama', 'username']));

    // $user = UserModel::all();
    // return view('user', ['data' => $user]);
    }

    function tambah_simpan(Request $request){ // Menambahkan parameter $request
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password), // Perbaikan penulisan
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }
}
