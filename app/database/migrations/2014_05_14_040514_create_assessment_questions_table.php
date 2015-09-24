<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentQuestionsTable extends Migration {
	public function up(){
            Schema::create('assessment_questions',function($attrib){
                $attrib->increments('id');
                $attrib->string('question');
                $attrib->string('academic_year');
                $attrib->string('section',1);
                $attrib->integer('week');
                $attrib->string('semister');
                $attrib->string('data_type');
                $attrib->timestamps();
                
                //unique keys
                $attrib->unique(array("question","academic_year","week","semister"));
            });
	}

	public function down(){
            Schema::drop('assessment_questions');
	}

}
