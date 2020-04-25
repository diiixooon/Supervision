<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matrik_id');

            $table->boolean('d1')->default(false);
            $table->string('d1_document')->default('empty');
            
            $table->boolean('d2')->default(false);
            $table->string('d2_document')->default('empty');

            $table->boolean('d3')->default(false);
            $table->string('d3_document')->default('empty');

            $table->boolean('d4')->default(false);
            $table->string('d4_document')->default('empty');

            $table->boolean('d5')->default(false);
            $table->string('d5_document')->default('empty');

            $table->boolean('d6')->default(false);
            $table->string('d6_document')->default('empty');

            $table->boolean('d7')->default(false);
            $table->string('d7_document')->default('empty');

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
        Schema::dropIfExists('approvals');
    }
}
