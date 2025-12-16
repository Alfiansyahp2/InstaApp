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
    // dd(auth()->id());
 
    // dd('STORE TERPANGGIL');
    // dd(
    //     $request->all(),
    //     $request->file('image'),
    //     auth()->id()
    // );

//     Post::create([
//     'user_id' => 2,
//     'caption' => 'TEST POST',
//     'image_path' => null,
// ]);

// dd('INSERT OK');




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

public function edit(Post $post)
{
    $this->authorize('update', $post);
    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);

    $request->validate([
        'caption' => 'required|string'
    ]);

    $post->update([
        'caption' => $request->caption
    ]);

    return redirect()->back()->with('success', 'Caption updated');
}


public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    $post->delete();

    return redirect()->route('posts.index')
           ->with('success', 'Post berhasil dihapus');
}



}
