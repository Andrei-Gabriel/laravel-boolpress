<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Mail;

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
 
        // if ($validator->fails()) {
        //     return response()->json([
        //         "success" => false,
        //         "errors" => $validator->errors(),
        //     ], 400);
        // }

        // Creazione del commento
        $newComment = new Comment();
        if(!empty($data["name"])){
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["content"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        // Invio la notifica email del commento
        Mail::to("webmaster@bollpress.com")->send(new CommentMail($newComment->post));

        // Restituisco una risposta
        return response()->json([
            "success" => true,
        ]);
    }
}
