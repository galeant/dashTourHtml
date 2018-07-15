<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('video_url', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->text('url')->nullable();
        //     $table->unsignedInteger('productId');
        //     $table->timestamps();

            
        //     $table->foreign('productId')
        //         ->references('productId')->on('product')
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('video_url');
    }
}
