<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID');
            $table->string('nicheng',20)->nullable()->comment('昵称');
            $table->tinyInteger('gender')->nullable()->comment('性别,男：1，女：2');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('province',20)->nullable()->comment('省份');
            $table->string('city',20)->nullable()->comment('城市');
            $table->string('district',20)->nullable()->comment('区级');
            $table->string('position',20)->nullable()->comment('工作');
            $table->string('avatar')->nullable()->comment('头像');

            $table->engine='innodb';
            $table->comment='用户信息表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_informations');
    }
}
