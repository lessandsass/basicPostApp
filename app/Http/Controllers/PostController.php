<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\AuthorizationException;

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

    public function destroy(Post $post)
    {
        if (! Gate::allows('delete', $post)) {
            abort(403);
        }

        $post->delete();
        return back();
    }

}
