<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function indexPost()
    {
        $category = Category::with('posts')->get();
        $post = Post::with('category')->get();
        return view('admin.posts',['post'=>$post,'category'=>$category]);
    }

    public function editPost(Post $post)
    {
        $category = Category::with('posts')->get();
        return view('admin.editPost',['post'=>$post,'categories'=>$category]);
    }

    public function postUpdate(Request $request,Post $post)
    {
        $post->update([
           'title'=>$request->title,
           'content'=>$request->content,
           'category_id'=>$request->category_id
        ]);
        return redirect()->route('adm.management.post');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->route('adm.management.post')->with('message','Post deleted');
    }
}
