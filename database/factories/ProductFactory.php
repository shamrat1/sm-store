<?php
/**
 * Created by PhpStorm.
 * User: YSS
 * Date: 11/28/2018
 * Time: 12:37 PM
 */
use Faker\Generator as Faker;
$factory->define(App\Product::class, function(Faker $faker){
    $name = $faker->randomElement(['iPhone XS','OnePlus 6','Samsung Galaxy Note 9','POCO F1','Huawei Mate 20']);
    $slug = str_slug($name,'-').'-'.time();
    return [

        'name' => $name,
        'supplier_id' => 10,
        'slug'=> $slug,
        'description' => $faker->realtext(170),
        'unit_price' => 500,
        'unit_weight' => 200,
        'category_id' => 1,
        'quantity' => 10,
        'unit_in_stock' => 5,
        'discount' => 0,
        'images' => 'mobile.jpg',
    ];
});
