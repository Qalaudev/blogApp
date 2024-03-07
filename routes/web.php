<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentaryController;
use App\Http\Controllers\Admin\AdminPostController;

Route::resource('/posts',PostController::class)->middleware('auth');

Route::middleware('auth')->group(function(){
    //admin router management
    Route::prefix('management')->as('adm.')->middleware(['hasrole:admin','hasrole:moderator'])->group(function (){
        Route::get('/users',[UserController::class,'index'])->name('management.users');
        Route::get('/posts/search',[UserController::class,'index'])->name('management.search');


        Route::get('users/{user}/edit',[UserController::class,'editRole'])->name('management.edit');
        Route::put('/users/{user}',[UserController::class,'updateRole'])->name('management.update');

        Route::put('/users/{user}/bun',[UserController::class,'isActive'])->name('management.bun');
        Route::put('/users/{user}/unbun',[UserController::class,'isDeactive'])->name('management.unbun');


        // category route with admin panel
        Route::get('/category',[AdminCategoryController::class,'category'])->name('management.category');
        Route::get('/category/{category}/edit',[AdminCategoryController::class,'editCategory'])->name('category.edit');
        Route::put('/category/{category}',[AdminCategoryController::class,'updateCategory'])->name('category.update');


        //comment route with admin panel
        Route::get('/commentary',[AdminCommentaryController::class,'commentary'])->name('management.commentary');
        Route::delete('/commentary/{commentary}/delete',[AdminCommentaryController::class,'deleteCommentary'])->name('management.deleteComment');


        //post route with admin panel
        Route::get('/post',[AdminPostController::class, 'indexPost'])->name('management.post');
        Route::get('/post/{post}/edit',[AdminPostController::class,'editPost'])->name('management.editPost');
        Route::put('/post/{post}',[AdminPostController::class,'postUpdate'])->name('management.postUpdate');
        Route::delete('/post/{post}/delete',[AdminPostController::class,'deletePost'])->name('management.postDelete');
    });

        //category route
        Route::get('/create/category',[CategoryController::class,'createCategory'])->name('create.category');
        Route::get('/category',[CategoryController::class,'indexCategory'])->name('index.category');
        Route::post('/category',[CategoryController::class,'storeCategory'])->name('store.category');
        Route::get('/posts/category/{category}',[CategoryController::class,'postsByCategory'])->name('post.category');

        //comment route
        Route::get('/post{post}',[CommentController::class,'indexComment'])->name('index.comment');
        Route::post('/post/{post}',[CommentController::class,'store'])->name('store.comment');
        Route::delete('/comment/delete/{comment}',[CommentController::class,'deleteComment'])->name('destroy.comment');
        Route::get('/comment/edit/{comment}',[CommentController::class,'editComment'])->name('edit.comment');
        Route::put('/comment/update/{comment}',[CommentController::class,'updateComment'])->name('update.comment');
});
        //home page
        Route::get('/',[PostController::class,'home'])->name('home.page');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        //register
        Route::get('/register',[RegisterController::class,'create'])->name('create');
        Route::post('/register',[RegisterController::class,'store'])->name('register');

        //login
        Route::get('/login',[LoginController::class,'create'])->name('login.store');
        Route::post('/login',[LoginController::class,'login'])->name('login');

        //logout
        Route::post('/logout',[LoginController::class,'logout'])->name('logout');



