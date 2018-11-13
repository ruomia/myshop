<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->comment('商品属性名称');
            $table->integer('cat_id')->comment('商品分类ID');
            $table->integer('pid')->default(0)->comment('上级属性ID');
            
            $table->engine='innodb';
            $table->comment='商品属性表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_names');
    }
}
