<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function index()
    {
        $data_prodi = DB::table('prodis') // Menggunakan nama tabel yang benar
            ->orderByDesc('id_prodi')
            ->get();

        return view('backend.prodi', compact('data_prodi'));
    }

    public function create()
    {
        return view('backend.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prodi' => 'required',
            'name_prodi' => 'required',
        ]);

        Prodi::create($request->all());

        return redirect()->route('backend.prodi')
                         ->with('success', 'Prodi created successfully.');
    }

    public function edit($id)
    {
        $prodi = Prodi::find($id);
        return view('backend.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_prodi' => 'required',
            'name_prodi' => 'required',
        ]);

        $prodi = Prodi::find($id);
        $prodi->update($request->all());

        return redirect()->route('backend.prodi')
                         ->with('success', 'Prodi updated successfully.');
    }

    public function destroy($id)
    {
        Prodi::destroy($id);
        return redirect()->route('backend.prodi')
                         ->with('success', 'Prodi deleted successfully.');
    }
}
