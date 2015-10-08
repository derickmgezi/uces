<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorAssessmentTable extends Migration {
	public function up(){
            Schema::create("instructor_assessment",function($attrib){
                $attrib->increments('id');
                $attrib->integer("student_enrollment_id")->unsigned();
                $attrib->integer("question_id")->unsigned();
                $attrib->string('assessment_value');
                $attrib->timestamps();

                //unique key
                $attrib->unique(array("student_enrollment_id","question_id"));

                //foreign key  
                $attrib->foreign("student_enrollment_id")
                        ->references("id")
                        ->on("student_course_enrollment")
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
            Schema::drop("instructor_assessment");
	}

}