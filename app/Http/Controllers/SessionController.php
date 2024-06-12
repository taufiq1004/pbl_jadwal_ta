<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
use App\Imports\ImportSession;
use App\Exports\ExportSession;
use Maatwebsite\Excel\Facades\Excel;

class SessionController extends Controller
{
    public function index()
    {
        $data_session = DB::table('sessions')
            ->join('students', 'sessions.nim_student', '=', 'students.nim')
            ->join('thesis', 'sessions.ta_id', '=', 'thesis.id_ta')
            ->join('lecturers as pembimbing1','sessions.pembimbing1','=','pembimbing1.nidn')
            ->join('lecturers as pembimbing2','sessions.pembimbing2','=','pembimbing2.nidn')
            ->join('lecturers as ketua_sidang','sessions.ketua_sidang','=','ketua_sidang.nidn')
            ->join('lecturers as sekretaris','sessions.sekretaris','=','sekretaris.nidn')
            ->join('lecturers as penguji1','sessions.penguji1','=','penguji1.nidn')
            ->join('lecturers as penguji2','sessions.penguji2','=','penguji2.nidn')
            ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
            ->select(
                'sessions.*',
                'students.name as student_name',
                'thesis.judul as thesis_title',
                'pembimbing1.name as pembimbing1_name',
                'pembimbing2.name as pembimbing2_name',
                'ketua_sidang.name as ketua_sidang_name',
                'sekretaris.name as sekretaris_name',
                'penguji1.name as penguji1_name',
                'penguji2.name as penguji2_name',
                'rooms.no_room as no_room'
            )
            ->orderBy('id_session')
            ->get();
        return view('backend.session', compact('data_session'));
    }

    public function create()
    {
        $students = DB::table('students')->get();
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $thesis = DB::table('thesis')->get();
        return view('backend.form.formSession', compact('students','lecturers','rooms','thesis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim_student' => 'required|exists:students,nim',
            'ta_id' => 'required|exists:thesis,id_ta',
            'pembimbing1' => 'required|exists:lecturers,nidn',
            'pembimbing2' => 'required|exists:lecturers,nidn',
            'ketua_sidang' => 'required|exists:lecturers,nidn',
            'sekretaris' => 'required|exists:lecturers,nidn',
            'penguji1' => 'required|exists:lecturers,nidn',
            'penguji2' => 'required|exists:lecturers,nidn',
            'no_room' => 'required|exists:rooms,id_room',
            'date_session' => 'required|date',
        ]);

        DB::table('sessions')->insert($request->except('_token'));
        return redirect('/sessions')->with('success', 'Session added successfully.');
    }

    public function edit($id)
    {
        $sessions = Session::where('id_session', $id)->first();
        $students = DB::table('students')->get();
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $thesis = DB::table('thesis')->get();
        return view('backend.form.formEditSession', compact('sessions', 'students','lecturers','rooms','thesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim_student' => 'required|exists:students,nim',
            'ta_id' => 'required|exists:thesis,id_ta',
            'pembimbing1' => 'required|exists:lecturers,nidn',
            'pembimbing2' => 'required|exists:lecturers,nidn',
            'ketua_sidang' => 'required|exists:lecturers,nidn',
            'sekretaris' => 'required|exists:lecturers,nidn',
            'penguji1' => 'required|exists:lecturers,nidn',
            'penguji2' => 'required|exists:lecturers,nidn',
            'no_room' => 'required|exists:rooms,id_room',
            'date_session' => 'required|date',
        ]);

        $data = $request->except('_token');
        DB::table('sessions')->where('id_session', $id)->update($data);
        return redirect('/sessions')->with('success', 'Session updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('sessions')->where('id_session', $id)->delete();
        return redirect('/sessions')->with('success', 'Session deleted successfully.');
    }

    function export_excel()
    {
        return Excel::download(new ExportSession, "Session.xlsx");
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $name_file = rand() . $file->getClientOriginalName();
        $file->move(public_path('file_session'), $name_file);

        Excel::import(new ImportSession, public_path('file_session/' . $name_file));

        return back()->with('success', 'File has been imported successfully.');
    }
}
