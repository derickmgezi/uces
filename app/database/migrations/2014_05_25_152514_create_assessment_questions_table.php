<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentQuestionsTable extends Migration {
	public function up(){
            Schema::create('assessment_questions',function($attrib){
                $attrib->increments('id');
                $attrib->string('question');
                $attrib->string('question_id')->unique();
                
                $attrib->timestamps();
            });
	}

	public function down(){
            Schema::drop('assessment_questions');
	}

}
