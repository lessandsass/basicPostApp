<?php

namespace App\Http\Controllers;

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
        dd('passed');

        // $request->user()->posts()->create([
        //     'body' => $request->body,
        // ]);

        // return back();
    }

}
