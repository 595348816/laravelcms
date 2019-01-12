<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('mobile',11)->unique()->nullable(false)->comment('手机号');
            $table->char('password',60)->nullable(false)->comment('密码');
            $table->char('appid',8)->nullable(false)->comment('商户id');
            $table->char('appsecret',40)->nullable(false)->comment('商户密钥');
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
        Schema::dropIfExists('visa_users');
    }
}
