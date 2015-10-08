<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create("problems_reports",function($attrib){
            $attrib->increments("id");
            $attrib->string("student_reg");
            $attrib->char("course_code",10);
            $attrib->char("academic_year",10);
            $attrib->string("problem");
            $attrib->timestamps();

            //foreign keys
            $attrib->foreign("student_reg")
                    ->references("id")
                    ->on("students")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $attrib->foreign(array("course_code","academic_year"))
                 ->references(array("course_code","academic_year"))
                 ->on("lecturers_courses_assessments")
                 ->onDelete("cascade")
                 ->onUpdate("cascade");
          });
	}

	public function down(){
            Schema::drop("problems_reports");
	}

}
