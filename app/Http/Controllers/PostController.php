<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    //
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService= $postService;
    }


    public function create()
    {
        return view('post.create');
    }


    public function index()
    {
        $post=$this->postService->get_all();
        return response()->json([
            "status" => 200,
             "data" => $post
        ]);
    }


    public function store(Request $request)
    {

        //dd($request->all());

         $request->validate([
            'content' => "required",
             "title" => "required |unique:posts,title"
         ]);


         $request->merge([
            "user_id" => User::inRandomOrder()->first()->id,
            "view_count" => 0
         ]);

         $post=$this->postService->store_post($request->all());
         dd($post);








    }


    // public function show()
    // {
    //     $post=Post::find(1);

    //     Log::info('Post retrieved: ' . $post->id);

    //     return view('post.show')->with('post',$post);

    // }




}
