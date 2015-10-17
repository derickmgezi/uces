<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentAssessmentTable extends Migration {
	public function up(){
            Schema::create("environment_assessment",function($attrib){
                $attrib->increments('id');
                $attrib->integer("placement")->unsigned();
                $attrib->integer("enrollment")->unsigned();
                $attrib->integer("question_id")->unsigned();
                $attrib->string('assessment_value');
                $attrib->timestamps();

                //unique key
                $attrib->unique(array("placement","question_id","enrollment"));

                //foreign key  
                $attrib->foreign("placement")
                        ->references("id")
                        ->on("venue_course_placement")
                        ->onDelete("cascade")
                        ->onUpdate("cascade");
                
                $attrib->foreign("enrollment")
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
            Schema::drop("environment_assessment");
	}

}