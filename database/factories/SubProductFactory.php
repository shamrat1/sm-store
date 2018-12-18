<?php

use Faker\Generator as Faker;

$factory->define(App\Subproduct::class, function (Faker $faker) {

    $accessory = $faker->randomElement(['40W Charger','Sport Case','Silicon Case','Sport Headphones','Powerbank']);
    $brand = $faker->randomElement(['iPhone XS','OnePlus 6','Samsung Galaxy Note 9','POCO F1','Huawei Mate 20']);
    $name = "$accessory for $brand";
    $slug = str_slug($name,'-').'-'.time();
            return [

                'name' => $name,
                'slug'=> $slug,
                'description' => $faker->realtext(170),
                'price' => rand(10,100),
                'quantity' => rand(3,10),
                'product_id'=>rand(1,5),
                'approved'=> 1,
                'image' => 'accessory.jpg',
            ];



});
