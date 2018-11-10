<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('goods_id')->comment('所属的商品ID');
            $table->string('attribute')->coment('SKU属性');
            $table->integer('stock')->comment('库存量');
            $table->decimal('price')->comment('价格');
            $table->integer('sales_volume')->default(0)->comment('SKU销量');
            
            $table->engine='innodb';
            $table->comment='SKU表(库存表)';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skus');
    }
}
