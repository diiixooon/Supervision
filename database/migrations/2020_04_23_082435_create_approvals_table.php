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
            $table->boolean('d1_approve')->default(false);
            $table->boolean('d1_decline')->default(false);
            $table->string('d1declinemessage')->default('');
            
            $table->boolean('d2')->default(false);
            $table->string('d2_document')->default('empty');
            $table->boolean('d2_approve')->default(false);
            $table->boolean('d2_decline')->default(false);
            $table->string('d2declinemessage')->default('');

            $table->boolean('d3')->default(false);
            $table->string('d3_document')->default('empty');
            $table->boolean('d3_approve')->default(false);
            $table->boolean('d3_decline')->default(false);
            $table->string('d3declinemessage')->default('');

            $table->boolean('d4')->default(false);
            $table->string('d4_document')->default('empty');
            $table->boolean('d4_approve')->default(false);
            $table->boolean('d4_decline')->default(false);
            $table->string('d4declinemessage')->default('');

            $table->boolean('d5')->default(false);
            $table->string('d5_document')->default('empty');
            $table->boolean('d5_approve')->default(false);
            $table->boolean('d5_decline')->default(false);
            $table->string('d5declinemessage')->default('');

            $table->boolean('d6')->default(false);
            $table->string('d6_document')->default('empty');
            $table->boolean('d6_approve')->default(false);
            $table->boolean('d6_decline')->default(false);
            $table->string('d6declinemessage')->default('');

            $table->boolean('d7')->default(false);
            $table->string('d7_document')->default('empty');
            $table->boolean('d7_approve')->default(false);
            $table->boolean('d7_decline')->default(false);
            $table->string('d7declinemessage')->default('');
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
