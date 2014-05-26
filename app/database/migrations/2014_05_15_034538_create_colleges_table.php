<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration {
	public function up(){
	 Schema::create('colleges',function($attrib){
                $attrib->string("id")->primary();
                $attrib->string("college_name");
                
                $attrib->timestamps();
            });
	}

	public function down(){
            Schema::drop("colleges");
	}

}
