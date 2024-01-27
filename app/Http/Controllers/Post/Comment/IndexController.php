<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke() {
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
