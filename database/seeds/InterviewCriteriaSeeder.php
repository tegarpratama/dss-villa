<?php

use Illuminate\Database\Seeder;

class InterviewCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min_param = [0, 25, 50, 75, 90];
        $max_param = [24, 49, 74, 89, 100];
        $linguistic_value = ['Sangat Rendah', 'Rendah', 'Cukup', 'Baik', 'Sangat Baik'];
        $score = [0, 0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('interview_criterias')->insert([
                'min_param' => $min_param[$i],
                'max_param' => $max_param[$i],
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
