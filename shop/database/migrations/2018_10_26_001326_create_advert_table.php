<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cat_id')->comment('广告分类ID');
            $table->string('title')->comment('标题');
            $table->string('url')->comment('URL');
            $table->string('logo')->comment('logo');
            $table->tinyInteger('state')->comment('是否有效（0：失效，1：有效）');
            $table->tinyInteger('sort')->comment('排序');

            $table->engine='innodb';
            $table->comment='广告表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
