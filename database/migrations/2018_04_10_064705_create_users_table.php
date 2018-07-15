<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('email',50)->unique();
            $table->string('fullName');
            $table->string('phone');
            $table->text('password');
            $table->string('token',100)->unique();
            $table->unsignedInteger('companyId');
            $table->integer('roleId');
            $table->timestamps();
            $table->rememberToken();

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
        Schema::dropIfExists('user');
    }
}
