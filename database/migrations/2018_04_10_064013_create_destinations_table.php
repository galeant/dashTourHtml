<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination', function (Blueprint $table) {
            $table->increments('destinationId');
            $table->string('destination')->nullable();
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('placeVisitHours')->default(0);
            $table->integer('placeVisitMinutes')->default(0);
            $table->string('placeScheduleType');
            //TAMBAHAN
            $table->string('destinationPhoneNumber')->nullable();
            $table->text('destinationAddress')->nullable();
            $table->unsignedInteger('placeTypeId');
            $table->enum('destinationStatus', ['active', 'disabled'])->default('active');
            
            $table->timestamps();

            
            $table->foreign('placeTypeId')
                ->references('placeTypeId')->on('place_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination');
    }
}
