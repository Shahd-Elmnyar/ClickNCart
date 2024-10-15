<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Authorize users with the 'admin' role to create products
        return $user->isAdmin()=== 1 ;
    }

    public function update(User $user, Product $product)
    {
        // Authorize users with the 'admin' role or the user who created the product
        return $user->isAdmin()=== 1  || $user->id === $product->created_by;
    }

    public function delete(User $user, Product $product)
    {
        // Authorize users with the 'admin' role or the user who created the product
        return $user->isAdmin()=== 1 || $user->id === $product->created_by;
    }
}
