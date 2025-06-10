<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('dashboard', compact('posts'));
    }

    // Tidak perlu create() & edit() jika pakai modal di dashboard

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|max:255',
            'content'   => 'required',
            'category'  => 'required',
        ]);

        Post::create([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'content'   => $request->content,
            'category'  => $request->category,
        ]);

        return redirect()->route('dashboard')->with('success', 'Konten berhasil ditambahkan!');
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'     => 'required|max:255',
            'content'   => 'required',
            'category'  => 'required',
        ]);

        $post->update([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'content'   => $request->content,
            'category'  => $request->category,
        ]);

        return redirect()->route('dashboard')->with('success', 'Konten berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Konten berhasil dihapus!');
    }
}
