<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //
    public function login(){
        return view('admin.login.login');
    }

    public function loginPost(Request $request)
{
    // Validasi input
    $credentials = $request->only('email', 'password');

    // Ambil user berdasarkan email
    $user = User::where('email', $credentials['email'])->first();

    // Cek apakah user ada dan password cocok (tanpa hash)
    if ($user && $user->password === $credentials['password']) {
        // Login manual
        Auth::login($user);

        $role = $user->role->name; // Pastikan relasi role-nya benar

        if ($role === 'admin') {
            return redirect()->route('admindash');
        } elseif ($role === 'user') {
            return redirect()->route('userdash');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Role tidak dikenali.');
        }
    }

    return redirect()->route('login')->with('error', 'Email atau password salah.');
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('lp');
    }
}
