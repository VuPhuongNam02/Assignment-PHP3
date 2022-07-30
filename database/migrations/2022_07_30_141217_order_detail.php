<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'order_details',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('orderId');
                $table->unsignedBigInteger('productId');
                $table->integer('quantity');
                $table->foreign('productId')->references('id')->on('products');
                $table->foreign('orderId')->references('id')->on('orders');
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
