<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_translations', function (Blueprint $table) {
            $table->increments('placeTranslationId');
            $table->unsignedInteger('destinationId');
            $table->string('placeName');
            $table->string('placeDescription');
            $table->unsignedInteger('languageId');
            $table->timestamps();

            $table->foreign('destinationId')
                ->references('destinationId')->on('destination')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('languageId')
                ->references('languageId')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_translations');
    }
}
