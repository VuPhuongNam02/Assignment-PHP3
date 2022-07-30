<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'orders',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('phone');
                $table->string('address');
                $table->string('email');
                $table->integer('total');
                $table->integer('payment');
                $table->unsignedBigInteger('userId');
                $table->foreign('userId')->references('id')->on('users');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
