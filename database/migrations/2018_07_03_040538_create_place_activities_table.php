<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_activities', function (Blueprint $table) {
            $table->increments('placeActivityId');
            $table->string('placeActivityName');
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
        Schema::dropIfExists('place_activities');
    }
}
