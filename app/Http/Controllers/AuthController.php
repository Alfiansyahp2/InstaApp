<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Proses REGISTER
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // TANPA HASH
        ]);

        // Redirect ke halaman login
        return redirect('/login')->with('success', 'Register berhasil');
    }

    /**
     * Proses LOGIN
     */
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || $user->password !== $request->password) {
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    Auth::login($user);
    return redirect()->intended('/posts');
}


    /**
     * Proses LOGOUT
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
