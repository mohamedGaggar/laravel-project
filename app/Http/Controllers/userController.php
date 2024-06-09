<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
class userController extends Controller
{
    public function posts(){


// $posts=auth()->user()->posts;
// $posts = auth()->user()->posts ?? [];
// $posts=Post::with('createdBy')->get();
$user = Auth::user();

// Get the posts created by the user
$posts = $user->posts;
        return view('posts.index',['posts'=>$posts]);
    }
}
