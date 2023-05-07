<?php

use Illuminate\Database\Seeder;

class AcceptanceCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = ['C1', 'C2', 'C3', 'C4'];
        $criteria = ['Pendidikan', 'Jurusan', 'Wawancara', 'Pengalaman'];
        $score = [0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 4; $i++) {
            DB::table('acceptance_criterias')->insert([
                'code' => $code[$i],
                'criteria' => $criteria[$i],
                'score' => $score[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
