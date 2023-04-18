<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;

class IndexController extends BaseController{
    public function __invoke()
    {
        $posts = $this->service->index();
        return view('admin.posts.index', compact('posts'));
    }
}
