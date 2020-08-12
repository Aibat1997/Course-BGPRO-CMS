<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->index();
            $table->string('name_ru')->nullable();
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->longText('content_ru')->nullable();
            $table->longText('content_kz')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('video_ru')->nullable();
            $table->string('video_kz')->nullable();
            $table->string('video_en')->nullable();
            $table->integer('sort_num')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
