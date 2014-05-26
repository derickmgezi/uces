<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {
	public function up(){
            Schema::create("students",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("department_id");
            $attrib->timestamps();

            //foreign keys
            $attrib->foreign("id")
                    ->references("id")
                    ->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            
            $attrib->foreign("department_id")
                    ->references("id")
                    ->on("departments")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
        });
	}

	public function down(){
            Schema::drop("students");

	}

}
