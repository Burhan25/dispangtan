<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class ShowBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('frontend.judul-blog', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.detail-blog', compact('blog'));
    }
}
