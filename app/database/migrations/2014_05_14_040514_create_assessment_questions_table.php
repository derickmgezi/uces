<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentQuestionsTable extends Migration {
	public function up(){
            Schema::create('assessment_questions',function($attrib){
                $attrib->increments('id');
                $attrib->string('question');
                $attrib->string('academic_year',7);
                $attrib->string('section',1);
                $attrib->integer('week');
                $attrib->string('semister',5);
                $attrib->string('data_type',7);
                //$attrib->timestamp('created_at')->useCurrent();
                //$attrib->timestamp('updated_at')->useCurrent();
                $attrib->timestamps();
                
                //unique keys
                $attrib->unique(array("question","academic_year","week","semister"),'unique_question');
            });
	}

	public function down(){
            Schema::drop('assessment_questions');
	}

}
