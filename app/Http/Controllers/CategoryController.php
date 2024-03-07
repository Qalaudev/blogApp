<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function postsByCategory(Category $category){
        $posts = $category->posts;
        return view('category.postByCategory',['postByCategory'=>$posts]);
    }

    public function indexCategory(){
        $allCategory = Category::all();
        return view('category.index',['categories'=>$allCategory]);
    }

    public function createCategory(){
        $this->authorize('create', Category::class);
        return view('category.createCategory');
    }

    public function storeCategory(Request $request){
        $this->authorize('create', Category::class);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
        ]);

        Category::create($validated);
        return redirect()->route('index.category')->with('message', 'Category saved');
        }

        public function editCategory(Request $request, Category $category){

        }
}
