<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('frontend.category',[
                'categories' => Category::with('posts')->get()]
        );
    }

    public function categoryPost(string $slug)
    {
        $category = Category::where('name', $slug)->first();
        $posts = $category->posts()->with(['photos','user', 'category'])->paginate(15);

        return view('frontend.categoryPost', ['posts' => $posts]);
    }
}
