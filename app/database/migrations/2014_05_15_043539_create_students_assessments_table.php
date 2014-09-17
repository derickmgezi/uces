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
            $attrib->increments("id",1,0);
            $attrib->string("reg_no",15);
            $attrib->string("course_code",7);
            $attrib->string("academic_year",10);
            $attrib->timestamps();

            $attrib->double("b6_01",1,0);
            $attrib->double("b6_02",1,0);
            $attrib->double("b6_03",1,0);
            $attrib->double("b6_04",1,0);
            $attrib->double("b6_05",1,0);
            $attrib->double("b6_06",1,0);
            $attrib->double("b6_07",1,0);
            $attrib->double("b6_08",1,0);
            $attrib->double("b6_09",1,0);
            $attrib->double("b6_10",1,0);
            $attrib->text("b6_11");

            $attrib->double("b10_01",1,0);
            $attrib->double("b10_02",1,0);
            $attrib->double("b10_03",1,0);
            $attrib->double("b10_04",1,0);
            $attrib->double("b10_05",1,0);
            $attrib->double("b10_06",1,0);
            $attrib->double("b10_07",1,0);
            $attrib->double("b10_08",1,0);
            $attrib->double("b10_09",1,0);
            $attrib->double("b10_10",1,0);
            $attrib->text("b10_11");

            $attrib->double("b14_01",1,0);
            $attrib->double("b14_02",1,0);
            $attrib->double("b14_03",1,0);
            $attrib->double("b14_04",1,0);
            $attrib->double("b14_05",1,0);
            $attrib->double("b14_06",1,0);
            $attrib->double("b14_07",1,0);
            $attrib->double("b14_08",1,0);
            $attrib->double("b14_09",1,0);
            $attrib->double("b14_10",1,0);
            $attrib->text("b14_11");

            $attrib->double("c6_01",1,0);
            $attrib->double("c6_02",1,0);
            $attrib->double("c6_03",1,0);
            $attrib->double("c6_04",1,0);
            $attrib->double("c6_05",1,0);
            $attrib->double("c6_06",1,0);
            $attrib->double("c6_07",1,0);
            $attrib->double("c6_08",1,0);
            $attrib->text("c6_09",1,0);
            $attrib->text("c6_10");

            $attrib->double("c10_01",1,0);
            $attrib->double("c10_02",1,0);
            $attrib->double("c10_03",1,0);
            $attrib->double("c10_04",1,0);
            $attrib->double("c10_05",1,0);
            $attrib->double("c10_06",1,0);
            $attrib->double("c10_07",1,0);
            $attrib->double("c10_08",1,0);
            $attrib->text("c10_09");
            $attrib->text("c10_10");

            $attrib->double("c14_01",1,0);
            $attrib->double("c14_02",1,0);
            $attrib->double("c14_03",1,0);
            $attrib->double("c14_04",1,0);
            $attrib->double("c14_05",1,0);
            $attrib->double("c14_06",1,0);
            $attrib->double("c14_07",1,0);
            $attrib->double("c14_08",1,0);
            $attrib->text("c14_09",1,0);
            $attrib->text("c14_10");


            $attrib->double("d6_01",1,0);
            $attrib->double("d6_02",1,0);
            $attrib->double("d6_03",1,0);
            $attrib->double("d6_04",1,0);
            $attrib->double("d6_05",1,0);
            $attrib->double("d6_06",1,0);
            $attrib->double("d6_07",1,0);
            $attrib->text("d6_08");


            $attrib->double("d10_01",1,0);
            $attrib->double("d10_02",1,0);
            $attrib->double("d10_03",1,0);
            $attrib->double("d10_04",1,0);
            $attrib->double("d10_05",1,0);
            $attrib->double("d10_06",1,0);
            $attrib->double("d10_07",1,0);
            $attrib->text("d10_08");

            $attrib->double("d14_01",1,0);
            $attrib->double("d14_02",1,0);
            $attrib->double("d14_03",1,0);
            $attrib->double("d14_04",1,0);
            $attrib->double("d14_05",1,0);
            $attrib->double("d14_06",1,0);
            $attrib->double("d14_07",1,0);
            $attrib->text("d14_08");

            //unique keys
            $attrib->unique(array("course_code","academic_year","reg_no"));

            //foreign keys
            $attrib->foreign(array("course_code","academic_year"))
                    ->references(array("course_code","academic_year"))
                    ->on("lecturers_courses_assessments")
                    ->onDelete("cascade")
                    ->onUpdate("cascade",1,0);

            $attrib->foreign("reg_no")
                    ->references("id")
                    ->on("students")
                    ->onDelete("cascade")
                    ->onUpdate("cascade",1,0);
        });
	}

	public function down(){
            Schema::drop("students_assessments",1,0);
	}

}
