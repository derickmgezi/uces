<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueTable extends Migration {
	public function up(){
            Schema::create("venue",function($attrib){
            $attrib->increments("id");
            $attrib->string("venue_name");
            $attrib->timestamps();
        });
	}

	public function down(){
            Schema::drop("venue");
	}

}
