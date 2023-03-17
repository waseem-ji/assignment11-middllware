<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        $posts = Post::latest();

        if(request('search')){
            $posts->where('body','like','%#'.request('search').'%');
        }


        return view('dashboard',[
            'posts' => $posts->get()
        ]);
    }
}
