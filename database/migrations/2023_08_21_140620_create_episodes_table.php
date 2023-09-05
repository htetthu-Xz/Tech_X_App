<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->string('title');
            $table->text('summary');
            $table->string('cover')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->enum('privacy', ['public', 'private']);
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
