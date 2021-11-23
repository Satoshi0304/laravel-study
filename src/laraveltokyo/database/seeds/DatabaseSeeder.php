<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** 使用したいSeederの追加 */
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrderSeeder::class);

    }
}
