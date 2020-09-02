<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Homepage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category1');
            $table->tinyInteger('category2');
            $table->tinyInteger('category3');
            $table->tinyInteger('banner1');
            $table->tinyInteger('banner2');
            $table->tinyInteger('banner3');
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
        Schema::dropIfExists('homepage');

    }
}
