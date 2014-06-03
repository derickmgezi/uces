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
            $attrib->string("reg_no");
            $attrib->string("course_code");
            $attrib->string("academic_year");
            $attrib->timestamps();

            $attrib->integer("b6_01");
            $attrib->integer("b6_02");
            $attrib->integer("b6_03");
            $attrib->integer("b6_04");
            $attrib->integer("b6_05");
            $attrib->integer("b6_06");
            $attrib->integer("b6_07");
            $attrib->integer("b6_08");
            $attrib->integer("b6_09");
            $attrib->integer("b6_10");
            $attrib->text("b6_11");

            $attrib->integer("b10_01");
            $attrib->integer("b10_02");
            $attrib->integer("b10_03");
            $attrib->integer("b10_04");
            $attrib->integer("b10_05");
            $attrib->integer("b10_06");
            $attrib->integer("b10_07");
            $attrib->integer("b10_08");
            $attrib->integer("b10_09");
            $attrib->integer("b10_10");
            $attrib->text("b10_11");

            $attrib->integer("b14_01");
            $attrib->integer("b14_02");
            $attrib->integer("b14_03");
            $attrib->integer("b14_04");
            $attrib->integer("b14_05");
            $attrib->integer("b14_06");
            $attrib->integer("b14_07");
            $attrib->integer("b14_08");
            $attrib->integer("b14_09");
            $attrib->integer("b14_10");
            $attrib->text("b14_11");

            $attrib->integer("c6_01");
            $attrib->integer("c6_02");
            $attrib->integer("c6_03");
            $attrib->integer("c6_04");
            $attrib->integer("c6_05");
            $attrib->integer("c6_06");
            $attrib->integer("c6_07");
            $attrib->integer("c6_08");
            $attrib->text("c6_09");
            $attrib->text("c6_10");

            $attrib->integer("c10_01");
            $attrib->integer("c10_02");
            $attrib->integer("c10_03");
            $attrib->integer("c10_04");
            $attrib->integer("c10_05");
            $attrib->integer("c10_06");
            $attrib->integer("c10_07");
            $attrib->integer("c10_08");
            $attrib->text("c10_09");
            $attrib->text("c10_10");

            $attrib->integer("c14_01");
            $attrib->integer("c14_02");
            $attrib->integer("c14_03");
            $attrib->integer("c14_04");
            $attrib->integer("c14_05");
            $attrib->integer("c14_06");
            $attrib->integer("c14_07");
            $attrib->integer("c14_08");
            $attrib->text("c14_09");
            $attrib->text("c14_10");


            $attrib->integer("d6_01");
            $attrib->integer("d6_02");
            $attrib->integer("d6_03");
            $attrib->integer("d6_04");
            $attrib->integer("d6_05");
            $attrib->integer("d6_06");
            $attrib->integer("d6_07");
            $attrib->text("d6_08");


            $attrib->integer("d10_01");
            $attrib->integer("d10_02");
            $attrib->integer("d10_03");
            $attrib->integer("d10_04");
            $attrib->integer("d10_05");
            $attrib->integer("d10_06");
            $attrib->integer("d10_07");
            $attrib->text("d10_08");

            $attrib->integer("d14_01");
            $attrib->integer("d14_02");
            $attrib->integer("d14_03");
            $attrib->integer("d14_04");
            $attrib->integer("d14_05");
            $attrib->integer("d14_06");
            $attrib->integer("d14_07");
            $attrib->text("d14_08");

            //unique keys
            $attrib->unique(array("course_code","academic_year","reg_no"));

            //foreign keys
            $attrib->foreign(array("course_code","academic_year"))
                    ->references(array("course_code","academic_year"))
                    ->on("lecturers_courses_assessments")
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
            Schema::drop("students_assessments");
	}

}
