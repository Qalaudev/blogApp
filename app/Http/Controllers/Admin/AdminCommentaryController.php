<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentaryController extends Controller
{
    public function commentary()
    {
        $comments = Comment::with('post')->get(); // Получить все комментарии
        return view('admin.commentary', ['comments' => $comments]);
    }

    public function deleteCommentary(Comment $comment)
    {
        $comment->delete(); // Удалить комментарий
        return redirect()->route('adm.management.commentary')->with('message', 'Comment deleted');
    }
}
