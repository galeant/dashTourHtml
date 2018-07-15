<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingProductHotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_hotel', function (Blueprint $table) {
            $table->increments('bookingHotelId');
            $table->string('bookingHotelNumber',30)->unique();
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
