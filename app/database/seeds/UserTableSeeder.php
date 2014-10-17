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
                'password'      =>      'ADMIN',
                'created_at'    =>      $now,
                'updated_at'    =>      $now
            )
        );
    }
}