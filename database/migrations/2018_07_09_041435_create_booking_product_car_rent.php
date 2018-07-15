<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingProductCarRent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_car_rent', function (Blueprint $table) {
            $table->increments('bookingCarRentId');
            $table->string('bookingCarRentNumber',30)->unique();
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
        //
    }
}
