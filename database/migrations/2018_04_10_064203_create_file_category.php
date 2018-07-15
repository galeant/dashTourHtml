<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('file_category', function (Blueprint $table) {
            // $table->increments('categoryFileId');
            // $table->string('categoryFileName');
            // $table->unsignedInteger('productId');
            // $table->timestamps();

            // $table->foreign('productId')
            //       ->references('productId')->on('product')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_category');
    }
}
