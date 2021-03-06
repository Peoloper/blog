<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(string $slug)
    {
        return view('frontend.post', [
            'post' => Post::where('slug',$slug)->first(),
            'categories' => Category::withCount('posts')->get(),
            'tags' => Tag::all(),
        ]);
    }

    public function posts()
    {
        return view('frontend.posts', [
            'posts' => Post::with(['photos', 'category', 'user'])->where('is_published', 1)->paginate(15)]
        );
    }
}
