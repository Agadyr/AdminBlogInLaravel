<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(Tag $tag,UpdateRequest $request)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tag.index');
    }

}
