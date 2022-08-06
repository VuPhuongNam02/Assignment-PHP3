<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_sizes',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('productId');
                $table->unsignedBigInteger('sizeId');
                $table->foreign('productId')->references('id')->on('products');
                $table->foreign('sizeId')->references('id')->on('sizes');
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
