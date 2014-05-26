<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {
	public function up(){
            Schema::create("departments",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("college_id");
            $attrib->string("department_name");
            $attrib->timestamps();

              //foreign keys
            $attrib->foreign("college_id")
                     ->references("id")
                     ->on("colleges")
                     ->onDelete("cascade")
                     ->onUpdate("cascade");
        });
	}

	public function down(){
            Schema::drop("departments");
	}

}
