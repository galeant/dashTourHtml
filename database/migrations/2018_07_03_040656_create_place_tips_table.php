<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_tips', function (Blueprint $table) {
            $table->increments('placeTipsId');
            $table->unsignedInteger('destinationId');
            $table->unsignedInteger('tipsQuestionId');
            $table->text('placeTipsAnswer')->nullable();
            $table->unsignedInteger('languageId');
            $table->timestamps();
            
            $table->foreign('destinationId')
                ->references('destinationId')->on('destination')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('tipsQuestionId')
            ->references('tipsQuestionId')->on('tips_questions');
            $table->foreign('languageId')
                ->references('languageId')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_tips');
    }
}
