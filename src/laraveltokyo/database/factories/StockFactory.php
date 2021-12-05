<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'stock_name' => '商品A-1',
        // 'stock_name' => [
        //     '商品A-1',
        //     '商品A-2',
        //     '商品A-3',
        //     '商品A-4',
        //     '商品A-5',
        //     '商品B-1',
        //     '商品B-2',
        //     '商品B-3',
        //     '商品B-4',
        //     '商品B-5',
        //     '商品C-1',
        //     '商品C-2',
        //     '商品C-3',
        //     '商品C-4',
        //     '商品C-5',
        // ],
        // 'stock_name' => $faker->name('male'),
        'stock_quantity' => $faker->buildingNumber(3),
        'stock_price' => $faker->buildingNumber(3),
        'status_num' => 5,
        // 'status_num' => [0, 5, 10],
        // 'status_num' => $faker->buildingNumber(1),
        // // 'status' => [
        // //     "",
        // //     "発注確認",
        // //     "発注状態",
        // //     "発注済み",
        // //     "発注受け取り済み"
        // //     ]
        'status' => "発注確認"
    ];
});
