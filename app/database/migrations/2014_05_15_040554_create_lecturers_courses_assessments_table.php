<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersCoursesAssessmentsTable extends Migration {
	public function up()
	{
            Schema::create("lecturers_courses_assessments",function($attrib){
            $attrib->increments('id');
            $attrib->string("lecturer_id");
            $attrib->char("course_code",10);
            $attrib->char("academic_year",10);
            $attrib->integer('semister');
            $attrib->integer("question_id")->unsigned();
            $attrib->string('assessment_value');
            $attrib->string("venue_id");
            
            $attrib->boolean("auth_14")->default(0);
            $attrib->boolean("auth_overall")->default(0);
                   
            $attrib->timestamps();
                    
            //unique key
            $attrib->unique(array("course_code","academic_year"));
                   
            //foreign key  
            $attrib->foreign("course_code")
                    ->references("id")
                    ->on("courses")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            
            $attrib->foreign("venue_id")
                    ->references("id")
                    ->on("venues")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $attrib->foreign("lecturer_id")
                    ->references("id")
                    ->on("lecturers")
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
            Schema::drop("lecturers_courses_assessments");
	}

}
