<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $sliders = Slider::orderBy('order')->get();
        $aboutText = Post::where('category', 'about')->first()->content ?? '';
        return view('dashboard', compact('posts', 'sliders', 'aboutText'));
    }

    // Konten
    public function storePost(Request $request)
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

    public function updatePost(Request $request, Post $post)
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

    public function destroyPost(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Konten berhasil dihapus!');
    }

    // Slider
    public function storeSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image' => $path,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('dashboard')->with([
            'success' => 'Slider berhasil ditambahkan!',
            'tab' => 'slider'
        ]);
    }

    public function destroySlider(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('dashboard')->with('success', 'Slider berhasil dihapus!');
    }
}

class PublicController extends Controller
{
    public function index()
    {
        // Ambil post dengan kategori 'about'
        $aboutText = Post::where('category', 'about')->first()?->content ?? '';

        // Ambil slider jika perlu
        $sliders = Post::where('category', 'slider')->get();

        // Kirim ke view
        return view('index', compact('aboutText', 'sliders'));
    }
}
