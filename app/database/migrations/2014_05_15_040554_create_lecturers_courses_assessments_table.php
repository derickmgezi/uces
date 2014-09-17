<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersCoursesAssessmentsTable extends Migration {
	public function up()
	{
            Schema::create("lecturers_courses_assessments",function($attrib){
            $attrib->increments('id');
            $attrib->string("course_code",7);
            $attrib->string("academic_year",10);
            $attrib->string("venue_id",20);
            $attrib->string("lecturer_id",20);
            
            $attrib->double("a6_01",1,0);
            $attrib->double("a6_02",1,0);
            $attrib->double("a6_03",1,0);
            $attrib->double("a6_04",1,0);
            $attrib->double("a6_05",1,0);
            $attrib->double("a6_06",1,0);
            $attrib->double("a6_07",1,0);
            $attrib->double("a6_08",1,0);
            $attrib->double("a6_09",1,0);
            $attrib->double("a6_10",1,0);
            $attrib->text("a6_11");

            $attrib->double("a10_01",1,0);
            $attrib->double("a10_02",1,0);
            $attrib->double("a10_03",1,0);
            $attrib->double("a10_04",1,0);
            $attrib->double("a10_05",1,0);
            $attrib->double("a10_06",1,0);
            $attrib->double("a10_07",1,0);
            $attrib->double("a10_08",1,0);
            $attrib->double("a10_09",1,0);
            $attrib->double("a10_10",1,0);
            $attrib->text("a10_11");

            $attrib->double("a14_01",1,0);
            $attrib->double("a14_02",1,0);
            $attrib->double("a14_03",1,0);
            $attrib->double("a14_04",1,0);
            $attrib->double("a14_05",1,0);
            $attrib->double("a14_06",1,0);
            $attrib->double("a14_07",1,0);
            $attrib->double("a14_08",1,0);
            $attrib->double("a14_09",1,0);
            $attrib->double("a14_10",1,0);
            $attrib->text("a14_11");
                   
            $attrib->timestamps();
                    
            //unique key
            $attrib->unique(array("course_code","academic_year"));
                   
            //foreign key        
            $attrib->foreign("venue_id")
                    ->references("id")
                    ->on("venues")
                    ->onDelete("cascade")
                    ->onUpdate("cascade",1,0);

            $attrib->foreign("lecturer_id")
                    ->references("id")
                    ->on("lecturers")
                    ->onDelete("cascade")
                    ->onUpdate("cascade",1,0);
        });
	}

	public function down(){
            Schema::drop("lecturers_courses_assessments",1,0);
	}

}
