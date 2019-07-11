<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product_type')->unsigned();
            $table->integer('id_group_status')->unsigned();
            $table->string('name_product');
            $table->string('model_code_product')->nullable();
            $table->string('number_product')->nullable();
            $table->string('IMEI_product')->nullable();
            $table->string('attachment_product')->nullable();
            $table->string('purchase_date',10);
            $table->tinyInteger('company')->default(0);
            $table->tinyInteger('pay')->default(0);
            $table->tinyInteger('guarantee')->default(0);
            $table->string('equipment')->nullable();
            $table->string('description_product')->nullable();
            $table->string('global_warranty_code')->nullable();
            $table->date('received_date');
            $table->date('return_date');
            $table->timestamps();

            $table->foreign('id_product_type')->references('id')->on('product_type');
            $table->foreign('id_group_status')->references('id')->on('group_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
