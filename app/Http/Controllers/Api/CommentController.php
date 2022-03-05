<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // Validazione

        // Creazione del commento
        $newComment = new Comment();
        $newComment->name = $data["name"];
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        // Restituisco una risposta
        return response()->json([
            "success" => true,
        ]);
    }
}
