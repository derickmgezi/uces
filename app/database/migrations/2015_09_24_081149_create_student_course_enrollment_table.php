<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseEnrollmentTable extends Migration {
	public function up()
	{
            Schema::create("student_course_enrollment",function($attrib){
            $attrib->increments("id");
            $attrib->char("reg_no",20);
            $attrib->integer("enrolled_course_id")->unsigned();
            $attrib->timestamps();

            //unique keys
            $attrib->unique(array("reg_no","enrolled_course_id"));

            //foreign keys
            $attrib->foreign("enrolled_course_id")
                    ->references("id")
                    ->on("lecturer_course_assignment")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $attrib->foreign("reg_no")
                    ->references("id")
                    ->on("students")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
        });
	}

	public function down(){
            Schema::drop("student_course_enrollment");
	}

}