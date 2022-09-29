<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCQSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_q_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lecture_id')->unsigned()->index()->nullable();
            $table->foreign('lecture_id')->references('id')->on('lectures')->onDelete('cascade');
            $table->string('question')->nullable();
            $table->string('options')->nullable();
            $table->string('answer')->nullable();
            $table->string('status')->default(1); // 1->active 2->inactive
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
        Schema::dropIfExists('m_c_q_s');
    }
}
