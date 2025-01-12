<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        return view('users.posts.index', [
            'posts' => $user->posts()->with('user')->paginate(20),
        ]);
    }
}
