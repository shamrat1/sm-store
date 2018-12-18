<?php

use Faker\Generator as Faker;

$factory->define(App\SubReviews::class, function (Faker $faker) {
    return [
        'rating' => rand(2,5),
        'review' => $faker->text(150),
        'sub_id' => rand(1,4),
        'user_id'=>rand(1,50),


    ];
});
