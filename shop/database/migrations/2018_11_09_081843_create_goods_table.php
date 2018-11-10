<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->comment('商品名称');
            $table->integer('cat_id')->comment('商品分类')->index();
            $table->integer('brand_id')->comment('品牌ID')->index();
            $table->string('logo')->comment('LOGO');
            $table->longtext('description')->comment('商品介绍');
            $table->longtext('after_service')->comment('售后服务');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->integer('sales_volume')->default(0)->comment('销量');
            $table->integer('comments')->default(0)->comment('评论数');

            $table->engine='innodb';
            $table->comment='商品表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
