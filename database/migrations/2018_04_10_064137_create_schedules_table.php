<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('scheduleId');
            $table->enum('scheduleType',['Multiple Days','Couple of Hours','Single Days'])->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->time('startHours')->nullable();
            $table->time('endHours')->nullable();
            $table->dateTime('maxBookingDateTime')->nullable();
            $table->integer('maximumBooking')->nullable();
            $table->integer('maximumGroup')->nullable();
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
        Schema::dropIfExists('schedule');
    }
}
