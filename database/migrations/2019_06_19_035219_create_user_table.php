<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_user',50);
            $table->string('phone_user',12);
            $table->string('username',50);
            $table->string('password');
            $table->tinyInteger('rate_user');
            $table->integer('id_group_user')->unsigned();
            $table->string('description_user');
            $table->string('remember_token')->nullable();
            $table->timestamps();

            $table->foreign('id_group_user')->references('id')->on('group_user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
