<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceCriteria;

class PriceCriteriaController extends Controller
{
    public function index()
    {
        $price = PriceCriteria::all();

        return view('pages.criteria.price.index', [
            'price' => $price
        ]);
    }

    public function edit($id)
    {
        $price = PriceCriteria::findOrFail($id);

        return view('pages.criteria.price.edit', [
            'price' => $price
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'linguistic_value' => $request->linguistic_value,
            'score' => $request->score
        ];

        $price = PriceCriteria::findOrFail($id);
        $price->update($data);

        return redirect()->route('harga.index')->with('status', 'Nilai kriteria harga sewa berhasil diperbarui.');
    }
}
