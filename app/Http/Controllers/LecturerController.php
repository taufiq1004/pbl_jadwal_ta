<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    public function index()
    {
        $data_lecturer = DB::table('lecturers')
            ->orderByDesc('id_lecturer')
            ->get();

        return view('backend.lecturer',compact('data_lecturer'));
    }
}
