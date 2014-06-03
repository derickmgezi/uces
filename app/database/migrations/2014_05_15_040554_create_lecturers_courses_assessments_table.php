<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersCoursesAssessmentsTable extends Migration {
	public function up()
	{
            Schema::create("lecturers_courses_assessments",function($attrib){
            $attrib->increments('id');
            $attrib->string("course_code");
            $attrib->string("academic_year");
            $attrib->string("venue_id");
            $attrib->string("lecturer_id");
            
            $attrib->integer("a6_01");
            $attrib->integer("a6_02");
            $attrib->integer("a6_03");
            $attrib->integer("a6_04");
            $attrib->integer("a6_05");
            $attrib->integer("a6_06");
            $attrib->integer("a6_07");
            $attrib->integer("a6_08");
            $attrib->integer("a6_09");
            $attrib->integer("a6_10");
            $attrib->text("a6_11");

            $attrib->integer("a10_01");
            $attrib->integer("a10_02");
            $attrib->integer("a10_03");
            $attrib->integer("a10_04");
            $attrib->integer("a10_05");
            $attrib->integer("a10_06");
            $attrib->integer("a10_07");
            $attrib->integer("a10_08");
            $attrib->integer("a10_09");
            $attrib->integer("a10_10");
            $attrib->text("a10_11");

            $attrib->integer("a14_01");
            $attrib->integer("a14_02");
            $attrib->integer("a14_03");
            $attrib->integer("a14_04");
            $attrib->integer("a14_05");
            $attrib->integer("a14_06");
            $attrib->integer("a14_07");
            $attrib->integer("a14_08");
            $attrib->integer("a14_09");
            $attrib->integer("a14_10");
            $attrib->text("a14_11");
                   
            $attrib->timestamps();
                    
            //unique key
            $attrib->unique(array("course_code","academic_year"));
                   
            //foreign key        
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
        });
	}

	public function down(){
            Schema::drop("lecturers_courses_assessments");
	}

}
