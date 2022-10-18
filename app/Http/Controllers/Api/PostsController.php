<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->paginate(2);
        
        //aggiunta immagini
        foreach($posts as $post){
            if($post->cover){
                $post->cover = asset('storage/' . $post->cover);
            }
        }

        return response()->json([
            'status' => true,
            'results' => $posts
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts = Post::where('slug', $slug)->get();

        return response()->json([
            'status' => true,
            'results' => $posts
        ]);
    }
}
