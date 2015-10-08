<?php
class UserTableSeeder extends Seeder {
    public function run(){
        $now = date('Y-m-d H:i:s');
        
        User::create(
            array(
                'first_name'    =>      'Derick',
                'middle_name'   =>      'Mgezi',
                'last_name'     =>      'Ruganuza',
                'title'         =>      'Mr.',
                'user_type'     =>      'Administrator',
                'id'            =>      'Admin.Derick.Ruganuza',
                'password'      =>      'RUGANUZA',
                'created_at'    =>      $now,
                'updated_at'    =>      $now
            )
        );
    }
}