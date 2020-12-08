<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create course_student, a many to many relationship table between courses and students
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            // id() by default are bigIncrements, so we nned unsignedBigInteger() instead of integer()
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });

        // Add constraint to make the relationships unique to prevent a student from being added twice to a course and vice-versa
        DB::statement('ALTER TABLE course_student ADD CONSTRAINT uq_course_student UNIQUE (course_id, student_id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
