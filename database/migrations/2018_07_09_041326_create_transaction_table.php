<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            // AUTO
            $table->increments('transactionId');
            $table->string('TransactionNumber',50)->unique();
            // GENERAL INFO FOR BOOKING
            $table->string('contactPersonName');
            $table->string('contactPersonPhone');
            $table->string('contactPersonEmail');
            // PRICE
            $table->integer('totalPrice');
            /*
                TOTAL PAYMENT INI TOTALPRICE(*:-+)DARI DISKON+UNIK KODE
            */
            $table->integer('totalPayment');
            /*
                UNIK KODE DARI TOTAL PAYMENT
            */
            $table->integer('paymentUniqueCode');
            /*
                INI VALUE DISKONNYA, INI MASIH DI PERTANYAKAN
            */
            $table->string('discount');
            $table->string('discountPercentage');
            // PAYMENT
            $table->enum('bookingStatus',['pending','paid','cancel'])->default('pending');
            $table->string('paymentMethod');
            // RELATION TO MEMBER
            $table->unsignedInteger('memberId');
            // LOG
            $table->datetime('paid_at');
            $table->timestamps();

            
            $table->foreign('memberId')
                ->references('memberId')->on('member')
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
        Schema::dropIfExists('booking_transaction');
    }
}
