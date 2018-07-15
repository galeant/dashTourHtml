<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table) {
            $table->increments('navbarId');
            $table->string('navbarName');
            $table->timestamps();
        });

        Schema::create('navbar_activity', function (Blueprint $table) {
            $table->increments('navbarActivityId');
            $table->string('navbarActivityName');
            $table->unsignedInteger('navbarId');
            $table->timestamps();

            $table->foreign('navbarId')
                ->references('navbarId')->on('navbar');
        });

        Schema::create('role_activity', function (Blueprint $table) {
            $table->increments('roleActivityId');
            $table->integer('userId');
            $table->unsignedInteger('roleId');
            $table->unsignedInteger('navbarActivityId');
            $table->boolean('roleActivityStatus');
            $table->timestamps();

            $table->unique(['userId', 'navbarActivityId']);

            $table->foreign('navbarActivityId')
                ->references('navbarActivityId')->on('navbar_activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_activity');
        Schema::dropIfExists('navbar');
        Schema::dropIfExists('navbar_activity');
    }
}
