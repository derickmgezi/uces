<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create("students_assessments",function($attrib){
            $attrib->increments("id");
            $attrib->char("reg_no",20);
            $attrib->integer("course_id")->unsigned();
            $attrib->integer("question_id")->unsigned();
            $attrib->string('assessment_value');
            $attrib->timestamps();

            //unique keys
            $attrib->unique(array("reg_no","course_id","question_id"));

            //foreign keys
            $attrib->foreign("course_id")
                    ->references("id")
                    ->on("lecturers_courses_assessments")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $attrib->foreign("reg_no")
                    ->references("id")
                    ->on("students")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            
            $attrib->foreign("question_id")
                    ->references("id")
                    ->on("assessment_questions")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
        });
	}

	public function down(){
            Schema::drop("students_assessments");
	}

}
