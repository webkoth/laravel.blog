<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::all();
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.index', compact('posts', 'tags', 'categories'));
    }
}
