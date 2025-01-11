<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
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
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', [ 'posts'=> $posts ]);
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

    public function destroy(Request $request, Post $post)
    {

        if (!$post->ownedBy($request->user())) {
            throw new AuthorizationException('You do not own this post');
        }

        $post->delete();
        return back();
    }

}
