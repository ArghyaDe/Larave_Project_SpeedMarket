<?php

namespace App\Policies;

use App\Seller;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SellerPolicy
{
    use HandlesAuthorization;


    public function create_supply(User $currentUser, Seller $seller)
    {
        return $seller->user->is($currentUser);
    }
}
