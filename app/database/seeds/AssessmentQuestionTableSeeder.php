<?php
class AssessmentQuestionTableSeeder extends Seeder {
    public function run(){
        $now = date('Y-m-d H:i:s');
            
        AssessmentQuestion::create(
            array(
                'question'      =>      '',
                'question_id'   =>      '',
                'data_type'     =>      '',
                'created_at'    =>      $now,
                'updated_at'    =>      $now
                )
            );
    }
}