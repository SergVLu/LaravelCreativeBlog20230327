<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post= $this->service->update($data,$post);
        
        return view('admin.posts.show', compact('post'));
    }
}
