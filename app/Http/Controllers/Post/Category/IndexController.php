<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts;
        $category = Category::all();
        $randomPosts = Post::get()->random(4);
        $likedposts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        return view('category.index',compact('posts','category','randomPosts','likedposts'));
    }

}

