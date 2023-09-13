<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->text('Bio');
            $table->string('profile')->nullable();
            $table->longText('link');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('instructors');
    }
}
