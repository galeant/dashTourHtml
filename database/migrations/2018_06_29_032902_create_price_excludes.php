<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceExcludes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excludes', function (Blueprint $table) {
            $table->unsignedInteger('productId');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('productId')
                  ->references('productId')->on('product')
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
        Schema::dropIfExists('price_exclude');
    }
}
