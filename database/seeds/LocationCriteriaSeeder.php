<?php

use Illuminate\Database\Seeder;

class LocationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linguistic_value =  ['0 - 499 M', '500 - 999 M', '1 - 1.4 Km', '1.5 - 1.9 Km', '2 - 2.5 Km'];
        $score = [0.25, 0.5, 0.75, 0.85, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('location_criterias')->insert([
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i]
            ]);
        }
    }
}
