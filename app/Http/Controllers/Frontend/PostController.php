<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function getPost(Post $post) {
        return view('frontend.post', [
            'post' => $post
        ]);
    }
}
