<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function create(User $user)
    {
        return $user->isAdmin() ==1; // Only admin can create categories
    }

    public function update(User $user, Category $category)
    {
        return $user->isAdmin() ==1; // Only admin can update categories
    }

    public function delete(User $user, Category $category)
    {
        return $user->isAdmin() ==1; // Only admin can delete categories
    }
}

