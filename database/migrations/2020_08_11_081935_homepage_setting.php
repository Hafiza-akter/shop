<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomepageSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category1')->nullable()->unsigned();
            $table->foreign('category1')->references('id')->on('category');
            $table->integer('category2')->nullable()->unsigned();
            $table->foreign('category2')->references('id')->on('category');
            $table->integer('category3')->nullable()->unsigned();
            $table->foreign('category3')->references('id')->on('category');
            $table->string('banner1');
            $table->string('banner2');
            $table->string('banner3');
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
        Schema::dropIfExists('homepage_setting');
    }
}
