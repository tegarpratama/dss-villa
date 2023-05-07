<?php

use Illuminate\Database\Seeder;

class ExperienceCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experience = ['< 3 Bulan', '< 1 Tahun', '1 Tahun', '> 1 Tahun', '> 2 Tahun'];
        $linguistic_value = ['Sangat Rendah', 'Rendah', 'Cukup', 'Baik', 'Sangat Baik'];
        $score = [0, 0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('experience_criterias')->insert([
                'experience' => $experience[$i],
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
