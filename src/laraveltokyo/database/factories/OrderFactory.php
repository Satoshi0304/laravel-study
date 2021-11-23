<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker $faker) {
    return [
        // 'stock_id' => $faker->randomNumber(2),
        'order_name' => $faker->unique()->lexify('????'),
        // $number_order = $faker->randomNumber(3);
        'number_order' => $faker->randomNumber(3),
        // $price = $faker->unique()->numberBetween($min = 800, $max = 20000);
        'price' => $faker->unique()->numberBetween($min = 800, $max = 20000),
        // 'total_price' => $price * $number_order,
        'total_price' => $faker->randomNumber(3),
        'status_num' => $faker->randomNumber(1),
        'status' => "状態なし",
        //
    ];
});
