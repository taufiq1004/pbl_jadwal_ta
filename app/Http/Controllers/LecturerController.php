<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function index()
    {
        $data_lecturer = DB::table('lecturers')
            ->join('prodis', 'lecturers.prodi_id', '=', 'prodis.id_prodi')
            ->orderByDesc('id_lecturer')
            ->get();

        return view('backend.lecturer',compact('data_lecturer'));
    }
}
