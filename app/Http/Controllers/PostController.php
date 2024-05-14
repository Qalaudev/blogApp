<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function home(){
        return view('welcome');
    }

    public function index()
    {
        $allPost = Post::all();
        return view('post.index',['posts'=>$allPost]);
    }

    public function create()
    {
        $allCategory = Category::all();
        return view('post.create',['categories'=>$allCategory]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time().$request->file('image')->getClientOriginalName();

        $image_path = $request->file('image')->storeAs('images', $fileName, 'public');
        $validated['image'] = '/storage/'.$image_path;
        
        Auth::user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('message','Post saved');
    }

    public function show(Post $post, Comment $comment)
    {
        return view('post.show',['post'=>$post,'comment'=>$comment]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view('post.edit',['post'=>$post,'categories'=>Category::all()]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
