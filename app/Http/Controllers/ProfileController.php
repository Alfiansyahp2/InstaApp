<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();

        $posts = Post::where('user_id', $user->id)
                     ->latest()
                     ->get();

        return view('user.profile', compact('user', 'posts'));
    }


    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6'
    ]);

    $data = [
        'name'  => $request->name,
        'email' => $request->email,
    ];

    // TANPA HASH (SESUSAI SISTEM KAMU)
    if ($request->filled('password')) {
        $data['password'] = $request->password;
    }

    $user->update($data);

    return redirect()->back()->with('success', 'Profile updated');
}

}
