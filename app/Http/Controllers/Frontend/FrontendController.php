<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\Http\Controllers\Controller;

class FrontendController extends Controller {

    public function index() {
        return view('frontend.index', [
            'posts' => Post::query()->paginate(10)
        ]);
    }

    public function setLocale($locale) {
        session()->put('locale', $locale);

        return redirect()->back();
    }

}
