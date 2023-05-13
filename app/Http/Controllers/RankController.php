<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Result;
use App\MasterCriteria;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::with('villa')->orderBy('total', 'desc')->paginate(5);

        return view('pages.rank.index', [
            'ranks' => $ranks
        ]);
    }

    public function refresh()
    {
        // delete all data first
        Rank::truncate();

        $results = Result::all();
        $criteria = MasterCriteria::get();
        $maxPrice = 0;
        $maxLocation = 0;
        $maxFacility = 0;
        $maxHygiene = 0;
        $maxSecurity = 0;

        // get data per column
        foreach($results as $result) {
            $villas[] = $result->villa_id;
            $prices[] = $result->price_score;
            $locations[] = $result->location_score;
            $facilities[] = $result->facility_score;
            $hygienes[] = $result->hygiene_score;
            $securities[] = $result->security_score;
        }

        // get max per column
        for($i = 0; $i < count($results); $i++) {
            if ($prices[$i] >= $maxPrice) {
                $maxPrice = $prices[$i];
            }

            if ($locations[$i] >= $maxLocation) {
                $maxLocation = $locations[$i];
            }

            if ($facilities[$i] >= $maxFacility) {
                $maxFacility = $facilities[$i];
            }

            if ($hygienes[$i] >= $maxHygiene) {
                $maxHygiene = $hygienes[$i];
            }

            if ($securities[$i] >= $maxSecurity) {
                $maxSecurity = $securities[$i];
            }
        }

        foreach($results as $result) {
            $price_result = (float) number_format(($result->price_score / $maxPrice), 2);
            $location_result = (float) number_format(($result->location_score / $maxLocation), 2);
            $facility_result = (float) number_format(($result->facility_score / $maxFacility), 2);
            $hygiene_result = (float) number_format(($result->hygiene_score / $maxHygiene), 2);
            $security_result = (float) number_format(($result->security_score / $maxSecurity), 2);
            $total = (float) number_format(($price_result * $criteria[0]->score) + ($location_result * $criteria[1]->score) + ($facility_result * $criteria[2]->score) + ($hygiene_result * $criteria[3]->score) + ($security_result * $criteria[4]->score), 3);

            $data[] = [
                'villa_id' => $result->villa_id,
                'price_result' => $price_result,
                'location_result' => $location_result,
                'facility_result' => $facility_result,
                'hygiene_result' => $hygiene_result,
                'security_result' => $security_result,
                'total' => $total
            ];
        }

        Rank::insert($data);

        return redirect()->route('hasil.index');
    }
}
