<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', compact('posts'));
    }
}
