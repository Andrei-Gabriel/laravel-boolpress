<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function update(Request $request, Comment $comment)
    {
        // Aggiornamento
        $comment->approved = true;
        $comment->save();

        // Redirect al commento modificato
        return redirect()->route("posts.show", $comment->post_id);
    }
}
