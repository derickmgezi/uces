<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueCoursePlacementTable extends Migration {
	public function up(){
            Schema::create("venue_course_placement",function($attrib){
                $attrib->increments('id');
                $attrib->integer("venue_id")->unsigned();
                $attrib->integer("assignment_id")->unsigned();
                $attrib->timestamps();

                //unique key
                $attrib->unique(array("venue_id","assignment_id"));

                //foreign key  
                $attrib->foreign("venue_id")
                        ->references("id")
                        ->on("venue")
                        ->onDelete("cascade")
                        ->onUpdate("cascade");

                $attrib->foreign("assignment_id")
                        ->references("id")
                        ->on("lecturer_course_assignment")
                        ->onDelete("cascade")
                        ->onUpdate("cascade");
            });
        }

	public function down(){
            Schema::drop("venue_course_placement");
	}

}