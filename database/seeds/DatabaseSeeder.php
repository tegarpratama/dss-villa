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
        $this->call(MasterCriteriaSeeder::class);
        $this->call(PriceCriteriaSeeder::class);
        $this->call(LocationCriteriaSeeder::class);
        $this->call(FacilityCriteriaSeeder::class);
        $this->call(HygieneCriteriaSeeder::class);
        $this->call(SecurityCriteriaSeeder::class);
    }
}
