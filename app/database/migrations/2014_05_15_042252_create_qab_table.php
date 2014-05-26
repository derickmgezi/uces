<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQabTable extends Migration {
	public function up()
	{
            Schema::create("qab",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("position");
            $attrib->timestamps();
            
            //foreign key
            $attrib->foreign("id")
                    ->references("id")
                    ->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
                 });
	}

	public function down(){
		Schema::drop("qab");
	}

}
