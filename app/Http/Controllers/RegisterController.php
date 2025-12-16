<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('admin.register.register');
    }

    public function registerPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        // Cari role 'user' dari tabel roles
        $userRole = Role::where('name', 'user')->first();

        if (!$userRole) {
            return redirect()->back()->with('error', 'Role user belum dibuat di database.');
        }

        // Buat user (password tidak di-hash)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // TANPA Hash::make()

        ]);

        // // Login otomatis
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
