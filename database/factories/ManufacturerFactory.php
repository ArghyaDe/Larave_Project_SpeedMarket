<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Manufacturer::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create(['is_manufacturer' => '1']),
        'company_name' => $faker->name,
        'company_address' => $faker->sentence
    ];
});
