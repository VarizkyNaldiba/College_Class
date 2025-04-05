<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\LevelModel; 


class AuthController extends Controller
{
    public function login() {
        if(auth()->check()) {
            return redirect('/');
        }
        return view('auth.login');
    }
    
    public function postlogin(Request $request) {
        if($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
            if (auth::attempt($credentials)) {
                return response()->json ([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')                                                                                                          
                ]);
    }
    
    return response()->json([
        'status' => false,
        'message' => 'Login Failed'
    ]);
}
return redirect('login');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil!',
            'redirect' => url('/login')
        ]);
    }

    return redirect('/login');
}
public function register()
{
   
    return view('auth.register');
}

public function register_save(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:m_user,username',
        'nama'     => 'required|string|max:255',
        'password' => 'required|string|min:6|confirmed',
        // level_id dihapus karena default ke 3
    ]);

    if ($validator->fails()) {
        if ($request->ajax()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        return back()->withErrors($validator)->withInput();
    }

    UserModel::create([
        'username' => $request->username,
        'nama'     => $request->nama,
        'password' => Hash::make($request->password),
        'level_id' => 3 // default level untuk user biasa
    ]);

    if ($request->ajax()) {
        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil!',
            'redirect' => route('login')
        ]);
    }

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
}

}

