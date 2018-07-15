<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('productId');
            $table->string('PICName')->nullable();
            $table->string('PICPhone')->nullable();
            $table->string('productCode',50)->unique();
            $table->string('productName',150)->nullable();
            $table->string('productCategory',20)->nullable();
            $table->string('productType',20)->nullable();
            $table->integer('minPerson')->nullable();
            $table->integer('maxPerson')->nullable();
            //meet point
            $table->text('meetingPointAddress')->nullable();
            $table->text('meetingPointLatitude')->nullable();
            $table->text('meetingPointLongitude')->nullable();
            $table->text('meetingPointNote')->nullable();
            $table->text('meetingPointNoteEN')->nullable();
            //
            $table->text('termCondition')->nullable();
            $table->text('termConditionEN')->nullable();

            $table->string('cancellationType')->nullable();
            $table->string('minCancellationDay')->nullable();
            $table->string('cancellationFee')->nullable();
            $table->enum('status',['noactive','active','expired'])->default('noactive');
            $table->unsignedInteger('companyId');
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
        Schema::dropIfExists('product');
    }
}
