<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/** Models内のSeed作成希望のModelをuseしclassに設定する(該当テーブルにダミーレコード作成が可能) */
$factory->define(User::class, function (Faker $faker) {
    return [
        'user_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'status_num' => $faker->randomNumber(1),
        'remember_token' => Str::random(10)

    ];
});
