<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke()
    {
        return view('backend.dashboard.index', [
            'post' => Post::count(),
            'category' => Category::count(),
            'tag' => Tag::count(),
            'user' => User::count(),
        ]);
    }
}
