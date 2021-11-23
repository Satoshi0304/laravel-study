<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /** 連動させたいModelのuseとデータ自体をどういうステータスにしたいかの設定 */
    public function run()
    {
        factory(User::class, 20)->create();
    }
}
