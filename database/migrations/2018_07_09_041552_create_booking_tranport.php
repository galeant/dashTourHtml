<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTranport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tranport', function (Blueprint $table) {
            $table->increments('bookingTransportId');
            $table->string('bookingTransportNumber',30)->unique();
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
