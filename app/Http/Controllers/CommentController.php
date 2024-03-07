<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function indexComment(Request $request){

    }

    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required',
            'post_id' => 'required|numeric|exists:posts,id'
        ]);
        Auth::user()->comments()->create($validated);
        return redirect()->back()->with('message','Comment saved');
    }

    public function editComment(Comment $comment){
        return view('comment.edit',['comment'=>$comment]);
    }

    public function updateComment(Request $request, Comment $comment){
        $comment->update([
            'content'=>$request->content,
        ]);
        return redirect()->back()->with('message','The comment has changed');
    }

    public function deleteComment(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect()->back()->withErrors('message','Comment deleted');
    }
}
