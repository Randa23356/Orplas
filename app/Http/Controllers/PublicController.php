<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;

class PublicController extends Controller
{
    public function index()
    {
        $aboutText = Post::where('category', 'about')->first()?->content ?? '';
        $sliders = Slider::all(); // Ambil semua slider

        return view('index', compact('aboutText', 'sliders'));
    }

    public function about()
    {
        $about = Post::where('category', 'about')->first();
        return view('about', compact('about'));
    }
}
