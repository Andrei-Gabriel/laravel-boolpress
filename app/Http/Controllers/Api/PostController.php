<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        // Tutti i post
        // $posts = Post::all();

        // I post pubblicati
        $posts = Post::where("published", true)->with(["category", "tags"])->get();
        // al singolare perché relazione una a molti, al plurale perché relazione molti a molti
        // Per conferma nome funzione in app/Post.php
        // with(["category", "tags"])
        return response()->json($posts);
    }

    public function show($slug){
        $post = Post::where("slug", $slug)->with(["category", "tags"])->first();
        
        // Gestione 404 per i path come: /posts/*
        if (empty($post)) {
            return response()->json(["message" => "Post Not Found"], 404);
        }

        return response()->json($post);
    }
}
