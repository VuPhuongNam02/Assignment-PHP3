<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->float('price');
            $table->string('image');
            $table->longText('description');
            $table->string('brand');
            $table->string('size');
            $table->integer('view');
            $table->string('gender');
            $table->integer('status');
            $table->integer('sale');
            $table->unsignedBigInteger('catId');
            $table->foreign('catId')->references('id')->on('category');
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
        Schema::dropIfExists('product');
    }
}
