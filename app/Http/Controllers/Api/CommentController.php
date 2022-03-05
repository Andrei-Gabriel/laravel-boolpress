<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // Validazione
        $validator = Validator::make($data, [
            'name' => 'nullable|string|max:50',
            'body' => 'string|required',
            'post_id' => 'exist:post.id'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 400);
        }

        // Creazione del commento
        $newComment = new Comment();
        if(!empty($data["name"])){
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        // Restituisco una risposta
        return response()->json([
            "success" => true,
        ]);
    }
}
