<?php

namespace App\Policies;

use App\Supply;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplyPolicy
{
    use HandlesAuthorization;

    public function edit_supply(User $currentUser, Supply $supply)
    {
        return $supply->seller->is($currentUser);
    }
}
