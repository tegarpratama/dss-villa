<?php

use Illuminate\Database\Seeder;

class EducationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education = ['Dan lain-lain', 'SMA', 'SMK', 'S1', '> S1'];
        $linguistic_value = ['Sangat Rendah', 'Rendah', 'Cukup', 'Baik', 'Sangat Baik'];
        $score = [0, 0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('education_criterias')->insert([
                'education' => $education[$i],
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
