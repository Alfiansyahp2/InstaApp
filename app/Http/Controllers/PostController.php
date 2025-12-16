<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with(['user', 'likes', 'comments'])
                ->latest()
                ->get();

    return view('user.index', compact('posts'));
}
public function store(Request $request)
{
    $request->validate([
        'caption' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        // SIMPAN KE storage/app/public/posts
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    Post::create([
        'user_id' => auth()->id(),
        'caption' => $request->caption,
        'image_path' => $imagePath, // contoh: posts/abc.jpg
    ]);

    return redirect()->route('posts.index');
}


}
