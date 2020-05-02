<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('super_matrik_id')->default('0');
            $table->string('name');
            $table->string('student_id')->default('0');
            $table->string('email')->unique();
            $table->string('level')->default('1');
            $table->string('password');
            $table->string('room_location')->default('0');
            $table->string('lat')->default('0');
            $table->string('lng')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
