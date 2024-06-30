<?php

namespace App\Http\Controllers;

use App\Models\ValidasiTa;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidasiTaController extends Controller
{
    public function index()
    {
        $data_validasi_ta = DB::table('validasi_ta')
            ->join('thesis', 'validasi_ta.ta_id', '=', 'thesis.id_ta')
            ->select('validasi_ta.*', 'thesis.judul as thesis_judul')
            ->orderBy('id_validasi')
            ->get();
        
        return view('backend.validasiTa', compact('data_validasi_ta'));
    }

    public function create()
    {
        $theses = Thesis::all();
        return view('backend.form.formValidasiTa', compact('theses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ta_id' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        ValidasiTa::create($request->all());
        
        return redirect('/validasiTa')->with('success', 'Validasi TA added successfully.');
    }

    public function edit($id)
    {
        $validasi_ta = ValidasiTa::findOrFail($id);
        $theses = Thesis::all();
        
        return view('backend.form.formEditValidasiTa', compact('validasi_ta', 'theses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ta_id' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        $validasi_ta = ValidasiTa::findOrFail($id);
        $validasi_ta->update($request->all());
        
        return redirect('/validasiTa')->with('success', 'Validasi TA updated successfully.');
    }

    public function destroy($id)
    {
        ValidasiTa::findOrFail($id)->delete();
        
        return redirect('/validasiTa')->with('success', 'Validasi TA deleted successfully.');
    }
}
