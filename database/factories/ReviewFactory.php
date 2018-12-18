<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {


    return [
        'rating' => rand(3,5),
        'review' => $faker->text(150),
        'product_id' => rand(1,5),
        'user_id'=>rand(1,50),
        'isApproved'=>1,

    ];
});
