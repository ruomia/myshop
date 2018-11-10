<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_skus', function (Blueprint $table) {
            $table->Integer('order_id');
            $table->Integer('sku_id');
            $table->tinyInteger('count');
            $table->decimal('price',10,2);
            $table->primary(['order_id','sku_id']);
            $table->engine="InnoDB";
            $table->comment="订单商品表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_skus');
    }
}
