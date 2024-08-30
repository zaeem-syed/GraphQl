<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //


    public function show()
    {
        $post=Post::find(1);
        
        Log::info('Post retrieved: ' . $post->id);

        return view('post.show')->with('post',$post);

    }


}
