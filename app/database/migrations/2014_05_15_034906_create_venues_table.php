<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
            Schema::create("venues",function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("venue_name");
            
            $attrib->timestamps();
        });
	}

	public function down(){
            Schema::drop("venues");
	}

}
