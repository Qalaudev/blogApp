<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentaryController extends Controller
{
    public function commentary(Comment $comment)
    {
        $comment = Comment::with('user')->get();
        return view('admin.commentary',['comment'=>$comment]);
    }

    public function deleteCommentary(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('adm.management.commentary')->with('message','Comment deleted');
    }
}
