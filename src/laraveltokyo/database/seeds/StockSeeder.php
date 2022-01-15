<?php

use Illuminate\Database\Seeder;
/** どのモデルをベースにするのか */
use App\Models\Stock;



class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Stock::class, 20)->create();
    }
}
