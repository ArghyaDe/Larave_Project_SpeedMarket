<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Supply;
use Faker\Generator as Faker;

$factory->define(Supply::class, function (Faker $faker) {
    return [
        'product_id' => factory('App\Product')->create(),
        'user_id' => factory('App\User')->create(),
        'seller_id' => factory('App\Seller')->create(),
        'price' => '5.6',
        'rating' => '5'
    ];
});
