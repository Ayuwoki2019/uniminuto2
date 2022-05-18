<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSemetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_semeters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('semeter_id');
            $table->foreign('semeter_id')->references('id')->on('semeters');
            $table->foreignId('student_id')->references('id')->on('students'); 
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
        Schema::dropIfExists('student_semesters');
    }
}
