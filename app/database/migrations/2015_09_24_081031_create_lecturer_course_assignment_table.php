<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerCourseAssignmentTable extends Migration {
	public function up()
	{
            Schema::create("lecturer_course_assignment",function($attrib){
            $attrib->increments('id');
            $attrib->string("lecturer_id");
            $attrib->char("course",10);
            $attrib->char("yr",10);
            $attrib->integer('semister');
            
            $attrib->boolean("auth_14")->default(0);
            $attrib->boolean("auth_overall")->default(0);
                   
            $attrib->timestamps();
                    
            //unique key
            $attrib->unique(array("course","yr"));
                   
            //foreign key  
            $attrib->foreign("course")
                    ->references("id")
                    ->on("courses")
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
            Schema::drop("lecturer_course_assignment");
	}

}