<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            /**$table->bigIncrements('id') */
            $table->foreignId('stock_id')
            /** $table->unsignedBigInteger('user_id') */
            ->references('stock_id')->on('stocks')
            /** ->constrained();上記でないと上手く機能しない*/
            ->onDelete('cascade');
            /** 外部キーと整合性対策オプション設定 */
            $table->string('order_name',255);
            $table->integer('price');
            $table->integer('total_price');
            $table->integer('status_num');
            $table->string('status',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
