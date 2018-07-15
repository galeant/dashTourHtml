<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish_rate', function (Blueprint $table) {
            $table->increments('publishRateId');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('campaignId');
            $table->integer('publishRateDiscount');
            $table->integer('publishRatePrice');
            $table->string('publishRateStatus');
            $table->timestamps();

            $table->foreign('productId')
                  ->references('productId')->on('product');
                  
            $table->foreign('campaignId')
                ->references('campaignId')->on('campaign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publish_rate');
    }
}
