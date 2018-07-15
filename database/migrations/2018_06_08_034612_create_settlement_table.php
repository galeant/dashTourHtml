<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettlementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement', function (Blueprint $table) {
            $table->increments('settlementId');
            $table->year('year');
            $table->string('month');
            $table->unsignedInteger('companyId');
            $table->double('totalSales', 20, 2);
            $table->double('totalNetSales', 20, 2);
            $table->double('totalCommission', 20, 2);
            $table->datetime('settlementDate')->nullable();
            $table->string('settlementStatus');
            $table->timestamps();
            
            $table->foreign('companyId')
                  ->references('companyId')->on('company')
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
        Schema::dropIfExists('settlement');
    }
}
