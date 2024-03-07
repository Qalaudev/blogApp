<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function category(){
        $category = Category::with('posts')->get();
        return view('admin.category',['categories'=>$category]);
    }

    public function editCategory(Category $category){
        return view('admin.categoryEdit',['category'=>$category]);
    }

    public function updateCategory(Request $request, Category $category){
        $category->update([
            'name' => $request->name,
            'code' => $request->code
        ]);
        return redirect()->route('adm.management.category');
    }
}
