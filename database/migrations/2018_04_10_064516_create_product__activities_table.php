<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_activity', function (Blueprint $table) {
            $table->unsignedInteger('productId');
            $table->unsignedInteger('activityId');
            $table->timestamps();

            $table->foreign('productId')
                  ->references('productId')->on('product')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('activityId')
                  ->references('activityId')->on('activity')
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
        Schema::dropIfExists('product_activity');
    }
}
