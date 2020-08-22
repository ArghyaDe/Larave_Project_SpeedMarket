<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    public function edit_supply(User $currentUser, User $seller)
    {
        return $currentUser->is($seller);
    }
}
