<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function save(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->get('content');
        $comment->user_id = $request->get('user');

        $comment->article_id = $request->get('article');

        $comment->save();

        return redirect(route('home'));
    }
}
