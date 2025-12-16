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
}
