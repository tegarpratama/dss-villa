<?php

use Illuminate\Database\Seeder;

class MasterCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = ['C1', 'C2', 'C3', 'C4', 'C5'];
        $criteria = ['Harga Sewa', 'Lokasi', 'Fasilitas', 'Kebersihan', 'Keamanan'];
        $score = [0.5, 0.25, 0.5, 0.75, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('master_criterias')->insert([
                'code' => $code[$i],
                'criteria' => $criteria[$i],
                'score' => $score[$i]
            ]);
        }
    }
}
