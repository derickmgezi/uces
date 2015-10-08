<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentAssessmentTable extends Migration {
	public function up(){
            Schema::create("environment_assessment",function($attrib){
                $attrib->increments('id');
                $attrib->integer("venue_course_id")->unsigned();
                $attrib->integer("question_id")->unsigned();
                $attrib->string('assessment_value');
                $attrib->timestamps();

                //unique key
                $attrib->unique(array("venue_course_id","question_id"));

                //foreign key  
                $attrib->foreign("venue_course_id")
                        ->references("id")
                        ->on("venue_course_placement")
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