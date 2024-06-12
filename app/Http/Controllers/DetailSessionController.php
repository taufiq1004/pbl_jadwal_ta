<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailSession;

class DetailSessionController extends Controller
{
    public function index()
    {
        $DetailSession = DB::table('detail_sessions')
            ->join('students', 'detail_sessions.nim_student', '=', 'students.nim')
            ->join('thesis', 'detail_sessions.ta_id', '=', 'thesis.id_ta')
            ->select(
                'detail_sessions.*', 'students.name as student_name',
                'thesis.judul as thesis_title'
                )
            ->orderBy('detail_sessions.id_detail')
            ->get();
        return view('backend.detailSession', compact('DetailSession'));
    }

    public function create()
    {
        $students = DB::table('students')->get();
        $thesis = DB::table('thesis')->get();
        return view('backend.form.formDetailSession', compact('students','thesis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim_student' => 'required',
            'ta_id' => 'required',
            'final_score' => 'required',
            'status' => 'required',
        ]);

        DB::table('detail_sessions')->insert($request->except(['_token', '_method']));
        return redirect('/detailSession')->with('success', 'Detail Session added successfully.');
    }

    public function edit($id)
    {
        $DetailSession = DB::table('detail_sessions')->where('id_detail', $id)->first();
        $students = DB::table('students')->get();
        $thesis = DB::table('thesis')->get();
        return view('backend.form.formEditDetailSession', compact('DetailSession', 'students','thesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim_student' => 'required',
            'ta_id' => 'required',
            'final_score' => 'required',
            'status' => 'required',
        ]);

        $data = $request->except(['_token', '_method']);
        DB::table('detail_sessions')->where('id_detail', $id)->update($data);
        return redirect('/detailSession')->with('success', 'Detail Session updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('detail_sessions')->where('id_detail', $id)->delete();
        return redirect('/detailSession')->with('success', 'Detail Session deleted successfully.');
    }
}
