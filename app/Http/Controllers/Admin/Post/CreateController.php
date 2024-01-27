<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke() {
        $categories = PostCategory::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
