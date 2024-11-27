<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:2|max:50',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();

    }

}
