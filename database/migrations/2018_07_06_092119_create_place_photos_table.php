<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_photos', function (Blueprint $table) {
            $table->increments('placePhotoId');
            $table->string('placePhotoUrl');
            $table->unsignedInteger('destinationId');
            $table->timestamps();

            $table->foreign('destinationId')
                ->references('destinationId')->on('destination')
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
        Schema::dropIfExists('place_photos');
    }
}
