<?php
class VenueTableSeeder extends Seeder {
    public function run(){
        $now = date('Y-m-d H:i:s');
            
            Venue::create(
            array(
                'id'            =>      '',
                'venue_name'    =>      '',
                'created_at'    =>      $now,
                'updated_at'    =>      $now
                )
            );
    }
}