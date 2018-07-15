<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DESTINATION
        Schema::create('image_destination', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->unsignedInteger('productId');
            $table->timestamps();

            
            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        // ACTIVITY
        Schema::create('image_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->unsignedInteger('productId');
            $table->timestamps();

            
            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        // ACCOMMODATION
        Schema::create('image_accommodation', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->unsignedInteger('productId');
            $table->timestamps();

            
            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        // OTHER
        Schema::create('image_other', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->unsignedInteger('productId');
            $table->timestamps();

            
            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        // VIDEO
        Schema::create('video_url', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url')->nullable();
            $table->unsignedInteger('productId');
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
        Schema::dropIfExists('image_destination');
        Schema::dropIfExists('image_activity');
        Schema::dropIfExists('image_accommodation');
        Schema::dropIfExists('image_other');
        Schema::dropIfExists('video_url');
    }
}
