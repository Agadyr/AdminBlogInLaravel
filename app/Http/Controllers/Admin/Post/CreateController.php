<?php

namespace App\Http\Controllers\Admin\Post;

//namespace App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller


{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }

}
