<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentPosts = Post::with(['photos', 'user.photos', 'category'])
            ->where('is_published', 1)
            ->orderBy('created_at', 'DESC')
            ->take(9)
            ->get();

        return view('frontend.index', [
            'recentPosts' => $recentPosts
        ]);
    }
}
