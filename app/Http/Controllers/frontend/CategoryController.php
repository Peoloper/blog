<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = cache()->remember('categories', today()->endOfDay(), function ()
        {
            return Category::with('posts', 'photos')->get();
        });

        return view('frontend.category',[
                'categories' => $categories]
        );
    }

    public function categoryPost(string $slug)
    {
        $category = Category::where('name', $slug)->first();
        $posts = $category->posts()->with(['photos','user', 'category'])->get();

        return view('frontend.categoryPost', ['posts' => $posts]);
    }
}
