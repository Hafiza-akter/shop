<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',100);
            $table->text('desc')->nullable()->change();
            $table->string('sku');
            $table->integer('sell_price');
            $table->integer('buy_price');
            $table->integer('quantity');
            $table->integer('supplier')->nullable()->unsigned();
            $table->foreign('supplier')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('brand')->nullable();
            $table->string('return_policy')->nullable();
            $table->string('warranty')->nullable();
            $table->integer('categoty_id')->unsigned();
            $table->foreign('categoty_id')->references('id')->on('category')->onDelete('cascade');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');

    }
}
