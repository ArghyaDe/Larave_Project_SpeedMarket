<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create(),
        'supply_id' => factory('App\Supply')->create(),
        'rating' => '4.5',
        'review' => $faker->sentence(),
    ];
});
