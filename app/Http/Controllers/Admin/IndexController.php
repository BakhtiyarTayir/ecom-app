<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['categoriesCount'] = PostCategory::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
