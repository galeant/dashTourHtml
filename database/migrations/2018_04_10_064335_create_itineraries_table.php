<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary', function (Blueprint $table) {
            $table->increments('itineraryId');
            $table->string('day')->nullable();
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->text('description')->nullable();
            $table->text('descriptionEN')->nullable();
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
        Schema::dropIfExists('itinerary');
    }
}
