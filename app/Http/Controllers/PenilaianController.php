<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Session;
use Illuminate\Support\Facades\DB;


class PenilaianController extends Controller
{
    public function index()
    {

        $penilaians= DB::table('penilaian')
        ->join('sessions', 'penilaian.session_id', '=', 'sessions.id_session')
        ->select('penilaian.*','sessions.id_session')
        ->orderBy('id_penilaian') // Order by id_prodi from smallest to largest
        ->get();
        return view('backend.penilaian', compact('penilaians'));
    }

    public function create()
    {
        $sessions = DB::table('sessions')->get();
        return view('backend.form.formPenilaian', compact('sessions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'materi_penilaian' => 'required|string|max:255',
            'bobot' => 'required|integer',
            'skor' => 'required|numeric|min:0|max:100',
            'revisi' => 'nullable|string',
        ]);

        Penilaian::create($request->all());
        return redirect()->route('backend.penilaian')->with('success', 'Penilaian added successfully.');
    }

    public function edit(Penilaian $penilaian)
    {
        $sessions = Session::all();
        return view('backend.penilaian.formEditPenilaian', compact('penilaian', 'sessions'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'materi_penilaian' => 'required|string|max:255',
            'bobot' => 'required|integer',
            'skor' => 'required|numeric|min:0|max:100',
            'revisi' => 'nullable|string',
        ]);

        $penilaian->update($request->all());
        return redirect()->route('backend.penilaian')->with('success', 'Penilaian updated successfully.');
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return redirect()->route('backend.penilaian')->with('success', 'Penilaian deleted successfully.');
    }
}
