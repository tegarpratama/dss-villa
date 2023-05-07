<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(AcceptanceCriteriaSeeder::class);
        $this->call(EducationCriteriaSeeder::class);
        $this->call(ExperienceCriteriaSeeder::class);
        $this->call(InterviewCriteriaSeeder::class);
        $this->call(MajorCriteriaSeeder::class);
    }
}
