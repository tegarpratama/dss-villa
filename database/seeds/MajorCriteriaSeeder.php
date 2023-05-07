<?php

use Illuminate\Database\Seeder;

class MajorCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major = ['Dan lain-lain', 'T. Industri', 'T. Sipil', 'T. Mesin', 'T. Elektro'];
        $linguistic_value = ['Sangat Rendah', 'Rendah', 'Cukup', 'Baik', 'Sangat Baik'];
        $score = [0, 0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('major_criterias')->insert([
                'major' => $major[$i],
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
