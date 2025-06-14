<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $sliders = Slider::orderBy('order')->get();
        return view('index', compact('posts', 'sliders'));
    }
}
