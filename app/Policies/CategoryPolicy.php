<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }


    public function view(User $user, Category $category): bool
    {
        //
    }


    public function create(User $user): bool
    {
        return $user->role->name != 'user';
    }

    public function update(User $user, Category $category): bool
    {
        //
    }


    public function delete(User $user, Category $category): bool
    {
        //
    }


    public function restore(User $user, Category $category): bool
    {
        //
    }

    public function forceDelete(User $user, Category $category): bool
    {
        //
    }
}
