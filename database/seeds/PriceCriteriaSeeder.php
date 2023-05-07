<?php

use Illuminate\Database\Seeder;

class PriceCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linguistic_value =  ['Rp500.000 - Rp999.000', 'Rp1.000.000 - Rp1.499.000', 'Rp1.500.000 - Rp.1.999.000', 'Rp2.000.000 - Rp2.499.000', 'Rp2.500.000 - Rp3.000.000'];
        $score = [0.25, 0.5, 0.75, 0.85, 1];

        for($i = 0; $i < 5; $i++) {
            DB::table('price_criterias')->insert([
                'linguistic_value' => $linguistic_value[$i],
                'score' => $score[$i]
            ]);
        }
    }
}
