<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->comment('商户id');
            $table->enum('type',['alipay','qqpay','wxpay'])->comment('支付类型');
            $table->unsignedInteger('money')->default(0)->comment('支付金额');
            $table->string('remark',100)->nullable()->comment('支付备注');
            $table->timestamp('pay_time')->comment('支付时间');
            $table->unsignedTinyInteger('is_notice')->default(0)->comment('是否通知');
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
        Schema::dropIfExists('visa_orders');
    }
}
