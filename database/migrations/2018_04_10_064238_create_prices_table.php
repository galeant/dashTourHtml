<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {
            $table->increments('priceId');
            $table->string('priceType')->nullable();
            $table->integer('numberOfPerson')->nullable();
            $table->integer('priceIDR')->nullable();
            $table->integer('priceUSD')->nullable();
            $table->unsignedInteger('productId');
            $table->timestamps();

            $table->foreign('productId')
                  ->references('productId')->on('product')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price');
    }
}
