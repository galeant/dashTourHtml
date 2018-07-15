<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_destination', function (Blueprint $table) {
            $table->unsignedInteger('productId');
            $table->string('provinceId')->nullable();
            $table->string('cityId')->nullable();
            $table->string('destinationId')->nullable();
            // $table->unsignedInteger('provinceId');
            // $table->unsignedInteger('cityId');
            // $table->unsignedInteger('destinationId');
            $table->timestamps();

            $table->foreign('productId')
                  ->references('productId')->on('product')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            // $table->foreign('destinationId')
            //       ->references('destinationId')->on('destination')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_destination');
    }
}
