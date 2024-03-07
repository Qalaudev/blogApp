<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }


    public function view(User $user, Post $post): bool
    {
        //
    }


    public function create(User $user): bool
    {
        //
    }


    public function update(User $user, Post $post): bool
    {
        return ($user->id == $post->user_id) || ($user->role->name != 'user');
    }


    public function delete(User $user, Post $post): bool
    {
        return ($user->id == $post->user_id) || ($user->role->name != 'user');
    }


    public function restore(User $user, Post $post): bool
    {
        //
    }


    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
