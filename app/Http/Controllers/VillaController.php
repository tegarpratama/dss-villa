<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicantRequest;
use App\Villa;
use App\LocationCriteria;
use App\PriceCriteria;
use App\HygieneCriteria;
use App\FacilityCriteria;
use App\SecurityCriteria;
use App\Result;
use DB;
use PDF;

class VillaController extends Controller
{
    public function index()
    {
        $villas = Villa::with('price', 'location', 'facility', 'hygiene', 'security')->paginate(10);

        return view('pages.villa.index', [
            'villas' => $villas
        ]);
    }

    public function create()
    {
        $locations = LocationCriteria::all();
        $prices = PriceCriteria::all();
        $hygienes = HygieneCriteria::all();
        $facilities = FacilityCriteria::all();
        $securities = SecurityCriteria::all();

        return view('pages.villa.create', [
            'locations' => $locations,
            'prices' => $prices,
            'hygienes' => $hygienes,
            'facilities' => $facilities,
            'securities' => $securities,
        ]);
    }

    public function store(ApplicantRequest $request)
    {
        $data = $request->all();
        $villa = Villa::create($data);

        $this->insertScoreVilla($villa);

        return redirect()->route('penginapan.index')->with('status', 'Penginapan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $villa = Villa::find($id);
        $locations = LocationCriteria::all();
        $prices = PriceCriteria::all();
        $hygienes = HygieneCriteria::all();
        $facilities = FacilityCriteria::all();
        $securities = SecurityCriteria::all();

        return view('pages.villa.edit', [
            'villa' => $villa,
            'locations' => $locations,
            'prices' => $prices,
            'hygienes' => $hygienes,
            'facilities' => $facilities,
            'securities' => $securities,
        ]);
    }

    public function update(ApplicantRequest $request, $id)
    {
        $data = $request->all();
        $villa = Villa::findOrFail($id);
        $villa->update($data);

        $this->insertScoreVilla($villa);

        return redirect()->route('penginapan.index')->with('status', 'Penginapan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Villa::findOrFail($id)->delete();
        DB::table('results')->where('villa_id', $id)->delete();
        DB::table('ranks')->where('villa_id', $id)->delete();

        return redirect()->route('penginapan.index')->with('status', 'Penginapan berhasil dihapus.');
    }

    public function insertScoreVilla($villa)
    {
        $villa_id = $villa->id;
        $location_score = LocationCriteria::find($villa->location_criteria_id)->score;
        $facility_score = FacilityCriteria::find($villa->facility_criteria_id)->score;
        $price_score = PriceCriteria::find($villa->price_criteria_id)->score;
        $hygiene_score = HygieneCriteria::find($villa->hygiene_criteria_id)->score;
        $security_score = SecurityCriteria::find($villa->security_criteria_id)->score;

        $data = [
            'villa_id' => $villa_id,
            'location_score' => $location_score,
            'facility_score' => $facility_score,
            'price_score' => $price_score,
            'hygiene_score' => $hygiene_score,
            'security_score' => $security_score,
        ];

        // check villa exists
        $result = Result::where('villa_id', $villa_id)->first();

        if($result) {
            $result->update($data);
        }else{
            Result::create($data);
        }

        return;
    }

    public function PrintController()
    {
        $villas = Villa::with('education', 'experience', 'major')->get();
        $pdf = PDF::loadView('pages.aplicant.print', $villas);

        return $pdf->download('data-penginapan.pdf');
    }
}
