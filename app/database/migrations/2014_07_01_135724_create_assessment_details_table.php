<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentDetailsTable extends Migration {
	public function up(){
            Schema::create('assessment_details',function($attrib){
                $attrib->increments('id');
                $attrib->string('academic_year');
                $attrib->integer('semester');
                $attrib->date('semester_date');
                $attrib->string('current_week');
                
                $attrib->timestamps();
            });
	}

	
	public function down(){
             Schema::drop("assessment_details");
	}

}
