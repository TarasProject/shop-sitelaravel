<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'type_object' => $faker->randomElement(['TV','Smartphone','Notebook']) ,
        'firm_object' => $faker->randomElement(['Acer','Sumsung','Lenovo']) ,
        'model_object' => $faker->randomElement(['J6','G570','T5']) ,
        'price' => $faker->numberBetween(10,100),
        'type_currency' =>$faker->randomElement(['UAH','USD','EUR']),
        'condition' =>$faker->randomElement(['Новий','БВ']),
        'phone' => $faker->phoneNumber,
        'more_information' =>'more_information',
        'store_id' =>$faker->numberBetween(1,5),
        'user_id' =>$faker->numberBetween(1,15),
    ];
});
