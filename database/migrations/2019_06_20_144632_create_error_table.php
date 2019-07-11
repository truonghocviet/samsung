<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('mobile_status');
            $table->tinyInteger('discount')->default(0);
            $table->string('repair_description');
            $table->integer('repair_cost');
            $table->integer('components_cost')->default(0);
            $table->timestamps();

            $table->foreign('id_customer')->references('id')->on('customer');
            $table->foreign('id_product')->references('id')->on('product');
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error');
    }
}
