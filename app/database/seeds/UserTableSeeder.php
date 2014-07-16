<?php
class UserTableSeeder extends Seeder {
    public function run(){
        $now = date('Y-m-d H:i:s');
        
        User::create(
            array(
                'first_name'    =>      'Administrator',
                'middle_name'   =>      '',
                'last_name'     =>      'ADMIN',
                'title'         =>      'Mr.',
                'user_type'     =>      'Administrator',
                'id'            =>      'ADMIN-01',
                'password'      =>      Hash::make('ADMIN'),
                'created_at'    =>      $now,
                'updated_at'    =>      $now
                )
            );
        
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
            
            Venue::create(
            array(
                'id'            =>      '',
                'venue_name'    =>      ''
                )
            );
    }
}