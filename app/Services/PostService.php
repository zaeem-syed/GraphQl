<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;


Class PostService
{

    public function get_all()
    {
       $post = Post::all();
        return $post;
    }

    public function store_post(array $values)
    {
        Post::create($values);
        return "your post has been created";
    }

}
