<?php
class AssessmentDetailTableSeeder extends Seeder {
    public function run(){
        $now = date('Y-m-d H:i:s');
            
            AssessmentDetail::create(
            array(
                'academic_year' =>      '2013/14',
                'semester'      =>      'Two',
                'semester_date' =>      '2014-03-10',
                'current_week'  =>      '16',
                'created_at'    =>      $now,
                'updated_at'    =>      $now
                )
            );
    }
}