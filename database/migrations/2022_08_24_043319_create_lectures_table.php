<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chapter_id')->unsigned()->index()->nullable();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->string('title');
            $table->string('cover_type'); // 1->video 2->image 3->ppt-slider
            $table->string('file')->nullable(); //if 3 then folder name of ppt
            $table->longtext('description')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('lectures');
    }
}
