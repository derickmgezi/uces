<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {
	public function up(){
            Schema::create("courses",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("department_id");
            $attrib->string("course_name");
            $attrib->timestamps();
		
            //foreign keys
            $attrib->foreign("department_id")
                    ->references("id")
                    ->on("departments")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
        });
	}

	public function down(){
            Schema::drop("courses");
	}

}
