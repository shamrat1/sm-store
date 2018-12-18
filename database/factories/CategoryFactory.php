<?php
/**
 * Created by PhpStorm.
 * User: YSS
 * Date: 11/30/2018
 * Time: 4:23 PM
 */
use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->randomElement(['Apple','Samsung','Oppo','Vivo','Xiaomi']);

    return [
        'id'=>rand(1,5),
        'name' => $name,
        'price_range' => "1000",

    ];
});

