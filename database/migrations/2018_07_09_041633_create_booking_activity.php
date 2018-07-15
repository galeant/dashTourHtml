<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_activity', function (Blueprint $table) {
            // UNIK
            $table->increments('bookingActivityId');
            $table->string('bookingActivityNumber',30)->unique();
            // JUST INFO, TANPA RELASI
            $table->string('activityCode');
            $table->string('activityName');
            $table->text('termCondition');
            // NUMB PERSON
            $table->integer('numberOfPerson');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->time('startHours')->nullable();
            $table->time('endHours')->nullable();
            // RELATION TO TRANSACTION
            $table->unsignedInteger('transactionId');
            $table->timestamps();

            $table->foreign('transactionId')
                ->references('transactionId')->on('transaction')
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
        Schema::dropIfExists('booking_activity');
    }
}
