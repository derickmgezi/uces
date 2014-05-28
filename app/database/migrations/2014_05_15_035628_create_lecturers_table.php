<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create("lecturers",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("position");
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
            Schema::drop("lecturers");
	}

}
