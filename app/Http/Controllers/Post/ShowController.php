<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {


        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id','!=',$post->id)
            ->get()
            ->take(3);
        $randomPosts = Post::get()->random(3);
        $category = Category::all();
//        dd($data->format('Y-m-d'));
        return view('post.show',compact('post','date','relatedPosts','randomPosts','category'));
    }

}

