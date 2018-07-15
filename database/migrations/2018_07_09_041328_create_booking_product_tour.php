<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingProductTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tour', function (Blueprint $table) {
            // UNIK 
            $table->increments('bookingTourId');
            $table->string('bookingTourNumber',30)->unique();
            // JUST INFO, TANPA RELASI
            $table->string('productCode');
            $table->string('productName');
            $table->text('termCondition');
            /*
                FIELD CANCELLATION FEE INI MASIH MENGGANGGU,
                EFEKNYA APA??
            */
            $table->string('cancellationType');
            $table->string('minCancellationDay');
            $table->string('cancellationFee');
            $table->text('cancellationDetails');
            // NUMB PERSON
            $table->integer('numberOfPerson');
            $table->integer('pricePerPerson');
            // PRICE
            $table->integer('sellingPrice');
            $table->integer('commission');
            $table->integer('netPrice');
            // SCHEDULE
            /* NOTE
                KENAPA ENGGA DI SAMBUNGIN KE TABEL SCHEDULE??
                KARENA KALAU MISAL DI TABEL SCHEDULE DI UPDATE,
                APA ENGGA BERASALAH??
            */
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->time('startHours')->nullable();
            $table->time('endHours')->nullable();
            /*
                INI DI PAKE BUAT PENGURANGAN INVENTORY AJA
                DI FIELD "MAXBOOKING" DI TABEL SCHEDULE

            */
            $table->unsignedInteger('scheduleId');
            // RELATION TO COMPANY
            $table->unsignedInteger('companyId');
            // RELATION TO TRANSACTION
            $table->unsignedInteger('transactionId');
            $table->timestamps();

            $table->foreign('transactionId')
                ->references('transactionId')->on('transaction')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('companyId')
                ->references('companyId')->on('company');

            $table->foreign('scheduleId')
                ->references('scheduleId')->on('schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_tour');
    }
}
