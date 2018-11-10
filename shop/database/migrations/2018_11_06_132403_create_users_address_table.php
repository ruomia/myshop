<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_address', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->comment('用户ID');
            $table->string('name',50)->comment('收件人姓名');
            $table->string("province",20)->comment('省份');
            $table->string('city',20)->comment('城市');
            $table->string('district',20)->comment('区级');
            $table->string('detailed_address')->comment('详细地址');
            $table->string('mobile',11)->comment('手机号');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('alias',20)->comment('别名');
            $table->tinyInteger('default')->default(0)->comment('默认使用地址：1');
            $table->engine = "InnoDB";
            $table->comment = "用户地址表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_address');
    }
}
