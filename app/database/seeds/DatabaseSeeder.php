<?php

class DatabaseSeeder extends Seeder {
    public function run(){
        $this->call('UserTableSeeder');
        $this->command->info('Administrator seeded!');
        $this->call('VenueTableSeeder');
        $this->command->info('A default Venue seeded!');
        $this->call('AssessmentDetailTableSeeder');
        $this->command->info('Default Assessment information seeded!');
        $this->call('AssessmentQuestionTableSeeder');
        $this->command->info('Assessment questions seeded!');
    }

}
