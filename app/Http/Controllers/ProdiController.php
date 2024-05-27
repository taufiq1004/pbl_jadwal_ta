<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function index()
    {
        $data_prodi = DB::table('prodis')
            ->orderBy('id_prodi') // Order by id_prodi from smallest to largest
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
       // $prodi = Prodi::find($id);

        $prodi= Prodi::where('id_prodi',$id)->first();
        return view('backend.form.formEditProdi', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'name_prodi' => 'required',
        ]);
        $data=[
            'name_prodi'=> $request->name_prodi,
        ];

        //$prodi = Prodi::find($id);
       // $prodi->update($request->all());

        DB::table('prodis')->where('id_prodi',$id)->update($data);
        return redirect()->route('backend.prodi')
                         ->with('success', 'Prodi updated successfully.');
    }

    public function destroy($id)
    {
        DB::table ('prodis')->where('id_prodi',$id)->delete();
        //Prodi::destroy($id);
        return redirect()->route('backend.prodi')
                         ->with('success', 'Prodi deleted successfully.');
    }
}
