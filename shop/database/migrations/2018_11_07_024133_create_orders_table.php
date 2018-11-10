<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->string('number')->comment('编号');
            $table->Integer('user_id')->comment('用户ID');
            $table->string('method',20)->comment('支付方式');
            $table->decimal('real_payment',10,2)->comment('实付款');
            $table->tinyInteger('state')->comment('订单状态，等待买家付款1、买家已付款2、未发货3、部分发货4、已发货5、物流派件中6、快件已签收7、交易成功8');
            $table->Integer('address_id')->comment('发货地址ID');
            $table->dateTime('payment_time')->nullable()->comment('支付时间');
            $table->dateTime('delivery_time')->nullable()->comment('发货时间');
            $table->dateTime('receipt_time')->nullable()->comment('收货时间');
            $table->dateTime('evaluation_time')->nullable()->comment('评价时间');
            $table->engine="InnoDB";
            $table->comment="订单表";
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
