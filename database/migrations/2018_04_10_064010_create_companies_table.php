<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('companyId');
            $table->string('companyName')->nullable();
            $table->string('fullName')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('role',['Bussiness Owner','Staff','Aggregator'])->default('Bussiness Owner');
            $table->string('companyPhone')->nullable();
            $table->string('companyEmail')->nullable();
            $table->string('companyWeb')->nullable();
            $table->string('companyProvince')->nullable();
            $table->string('companyCity')->nullable();
            $table->text('companyAddress')->nullable();
            $table->string('companyPostal')->nullable();
            $table->enum('companyBookSystem',['yes','no'])->default('no');
            $table->string('companyBankName')->nullable();
            $table->string('companyBankAccountNumber')->nullable();
            $table->enum('companyBankAccountTitle',['Mr','Mrs','Miss'])->default('Mr');
            $table->string('companyBankAccountName')->nullable();
            $table->text('bankAccountScanUrl')->nullable();
            $table->enum('companyFileReq',['Company','Personal'])->nullable();
            $table->text('aktaUrl')->nullable();
            $table->text('siupUrl')->nullable();
            $table->text('npwpUrl')->nullable();
            $table->text('ktpUrl')->nullable();
            $table->text('evidanceUrl')->nullable();
            $table->enum('status',['NotVerified','AwaitingSubmission','AwaitingModeration','InsufficientData','Rejected','Active','Disable'])->default('NotVerified');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
