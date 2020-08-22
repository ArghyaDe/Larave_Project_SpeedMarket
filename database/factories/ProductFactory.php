<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'manufacturer_id' => factory('App\Manufacturer')->create(),
        'name' => $faker->name,
        'specification' => $faker->sentence,
    ];
});
