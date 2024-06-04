<?php
namespace App\Http\Controllers;

use App\Models\DetailThesis;
// use App\Models\Student;
// use App\Models\Thesis;
// use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailThesisController extends Controller
{
    public function index()
    {
        $data_detail_thesis = DB::table('detail_thesis')
            ->join('students', 'detail_thesis.nim_student', '=', 'students.nim')
            ->join('thesis', 'detail_thesis.ta_id', '=', 'thesis.id_ta')
            ->join('lecturers as pembimbing1', 'detail_thesis.pembimbing1', '=', 'pembimbing1.nidn')
            ->join('lecturers as pembimbing2', 'detail_thesis.pembimbing2', '=', 'pembimbing2.nidn')
            ->select(
                'detail_thesis.*',
                'students.name as student_name',
                'thesis.judul as thesis_title',
                'pembimbing1.name as pembimbing1_name',
                'pembimbing2.name as pembimbing2_name'
            )
            ->orderBy('id_detailta')
            ->get();
        return view('backend.detailThesis', compact('data_detail_thesis'));
    }

    public function create()
    {
        $students = DB::table('students')->get();
        $thesis = DB::table('thesis')->get();
        $lecturers = DB::table('lecturers')->get();
        return view('backend.form.formDetailThesis', compact('students', 'thesis', 'lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_detailta' => 'required',
            'nim_student' => 'required',
            'ta_id' => 'required',
            'pembimbing1' => 'required',
            'pembimbing2' => 'required',
        ]);

        DetailThesis::create($request->all());
        return redirect('/detailThesis')->with('success', 'Detail Thesis added successfully.');
    }

    public function edit($id)
    {
        $detailThesis = DetailThesis::where('id_detailta', $id)->first();
        $students = DB::table('students')->get();
        $thesis = DB::table('thesis')->get();
        $lecturers = DB::table('lecturers')->get();
        return view('backend.form.formEditDetailThesis', compact('detailThesis', 'students', 'thesis', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim_student' => 'required',
            'ta_id' => 'required',
            'pembimbing1' => 'required',
            'pembimbing2' => 'required',
        ]);

        $data = [
            'nim_student' => $request->nim_student,
            'ta_id' => $request->ta_id,
            'pembimbing1' => $request->pembimbing1,
            'pembimbing2' => $request->pembimbing2,
        ];
        DB::table('detail_thesis')->where('id_detailta', $id)->update($data);
        return redirect('/detailThesis')->with('success', 'Detail Thesis updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('detail_thesis')->where('id_detailta', $id)->delete();
        return redirect('/detailThesis')->with('success', 'Detail Thesis deleted successfully.');
    }
}
