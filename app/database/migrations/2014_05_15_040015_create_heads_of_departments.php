<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadsOfDepartments extends Migration {
	public function up()
	{
            Schema::create("heads_of_department",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("lecturer_id");
            $attrib->timestamps();

            //foreign key
            $attrib->foreign("id")
                    ->references("id")
                    ->on("users")
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
            Schema::drop("heads_of_department");
	}

}
