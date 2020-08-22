<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function edit_product(User $currentUser, Product $product)
    {
        return $product->manufacturer->user->is($currentUser);
    }
}
