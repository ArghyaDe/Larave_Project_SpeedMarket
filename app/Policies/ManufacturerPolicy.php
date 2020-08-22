<?php

namespace App\Policies;

use App\Manufacturer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManufacturerPolicy
{
    use HandlesAuthorization;

    public function create_product(User $currentUser, Manufacturer $manufacturer)
    {
        return $manufacturer->user->is(current_user());
    }
}
