<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAssessmentTable extends Migration {
	public function up(){
            Schema::create("class_assessment",function($attrib){
                $attrib->increments('id');
                $attrib->integer("assignment_id")->unsigned();
                $attrib->integer("question_id")->unsigned();
                $attrib->string('assessment_value');
                $attrib->timestamps();

                //unique key
                $attrib->unique(array("assignment_id","question_id"));

                //foreign key  
                $attrib->foreign("assignment_id")
                        ->references("id")
                        ->on("lecturer_course_assignment")
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
            Schema::drop("class_assessment");
	}

}