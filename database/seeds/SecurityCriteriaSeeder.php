<?php

use Illuminate\Database\Seeder;

class SecurityCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linguistic_value = ['Sangat Tidak Aman', 'Kurang Aman', 'Cukup Aman', 'Aman', 'Sangat Aman'];
        $score = [0.25, 0.5, 0.75, 0.85, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('security_criterias')->insert([
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i]
            ]);
        }
    }
}