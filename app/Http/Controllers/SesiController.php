<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index()
    {
        $data_sesi = DB::table('sesi')
            ->orderBy('sesi') // Order by id_prodi from smallest to largest
            ->get();


        return view('backend.sesi', compact('data_sesi'));
    }

    public function create()
    {
        return view('backend.sesi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sesi' => 'required',
        ]);

        Sesi::create($request->all());

        return redirect()->route('backend.sesi')
                         ->with('success', 'Sesi created successfully.');
    }

    public function edit($id)
    {
       // $prodi = Prodi::find($id);

        $sesi= Sesi::where('sesi',$id)->first();
        return view('backend.form.formEditSesi', compact('sesi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'sesi' => 'required',

        ]);
        $data=[
            'sesi'=> $request->sesi,
            
        ];

        //$prodi = Prodi::find($id);
       // $prodi->update($request->all());

        DB::table('sesi')->where('sesi',$id)->update($data);
        return redirect()->route('backend.sesi')
                         ->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        DB::table ('sesi')->where('sesi',$id)->delete();
        //Prodi::destroy($id);
        return redirect()->route('backend.sesi')
                         ->with('success', 'Room deleted successfully.');
    }
}
