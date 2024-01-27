<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $categories = PostCategory::all();
        return view('admin.category.index', compact('categories'));
    }
}
