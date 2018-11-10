<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->comment('用户ID');
            $table->integer('goods_id')->comment('商品ID');
            $table->integer('sku_id')->comment('sku ID');
            $table->decimal('price')->comment('单价');
            $table->tinyInteger('count')->comment('数量');
            $table->tinyInteger('checked')->default(0)->comment('是否选中');
            $table->engine = "InnoDB";
            $table->comment = "购物车表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
