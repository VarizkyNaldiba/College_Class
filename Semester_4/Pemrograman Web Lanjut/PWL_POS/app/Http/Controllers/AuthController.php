<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}

