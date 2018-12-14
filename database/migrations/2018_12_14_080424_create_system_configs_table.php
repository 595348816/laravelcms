<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique()->comment('配置变量名');
            $table->string('type',30)->comment('配置类型');
            $table->string('title',50)->comment('配置标题');
            $table->string('describe',255)->nullable(true)->comment('配置说明');
            $table->unsignedTinyInteger('group')->default(0)->comment('配置分组');
            $table->string('extra',255)->nullable(true)->comment('配置选项');
            $table->text('value')->comment('配置值');
            $table->unsignedSmallInteger('sort')->default(0)->comment('配置值');
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
        Schema::dropIfExists('system_configs');
    }
}
