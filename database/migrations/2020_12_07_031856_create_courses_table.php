<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create course table
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description');
            $table->date('start_date');
            $table->float('weeks'); // duration in weeks
            $table->timestamps();
        });

        // insert the student and admin roles
        DB::table('courses')->insert([
            [
                'name' => 'Test Course',
                'description' => 'A test course',
                'start_date' => date('Y-m-d' ,time()),
                'weeks' => 8
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
