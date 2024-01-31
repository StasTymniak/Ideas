<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){

        $validated = request()->validate([
            'content'=> 'required|min:3|max:240',
        ]);

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->user()->id;
        $comment->content = $validated['content'];
        $comment->save();


        return redirect()->route("ideas.show",$idea->id)->with("success","Comment created successfully");
    }
}
