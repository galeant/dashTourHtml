<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_schedules', function (Blueprint $table) {
            $table->increments('placeScheduleId');
            $table->string('placeScheduleDay');
            $table->string('placeScheduleCondition');
            $table->time('placeScheduleStartHour');
            $table->time('placeScheduleEndHour');
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
        Schema::dropIfExists('place_schedules');
    }
}
