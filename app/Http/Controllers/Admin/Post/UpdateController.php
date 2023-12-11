<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(Post $post,UpdateRequest $request)
    {

        $data = $request->validated();
        $post =  $this->service->store($data,$post);

        return redirect()->route('admin.post.index');
    }

}
