<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create(['is_seller' => '1']),
        'company_name' => $faker->name,
        'company_address' => $faker->sentence

    ];
});
