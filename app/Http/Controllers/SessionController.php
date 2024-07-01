<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
use App\Imports\ImportSession;
use App\Exports\ExportSession;
use App\Models\Room;
use Maatwebsite\Excel\Facades\Excel;

class SessionController extends Controller
{
    public function index()
    {
        $data_sessions = DB::table('sessions')
            ->join('students', 'sessions.nim_student', '=', 'students.nim')
            ->join('thesis as judul_ta', 'sessions.ta_id', '=', 'judul_ta.id_ta')
            ->join('lecturers as ketua_sidang', 'sessions.ketua_sidang', '=', 'ketua_sidang.nidn')
            ->join('lecturers as sekretaris', 'sessions.sekretaris', '=', 'sekretaris.nidn')
            ->join('lecturers as anggota', 'sessions.anggota', '=', 'anggota.nidn')
            ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
            ->select(
                'sessions.*',
                'students.name as student_name',
                'judul_ta.judul as judul_ta',
                'ketua_sidang.name as ketua_name',
                'sekretaris.name as sekretaris_name',
                'anggota.name as anggota_name',
                'rooms.no_room as no_room',
                'rooms.sesi'
            )
            ->orderBy('sessions.id_session')
            ->get();    
        return view('backend.session', compact('data_sessions'));
    }

    public function create()
    {
        $students = DB::table('students')->get();
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $thesis = DB::table('thesis')->get();

        return view('backend.form.formSession', compact('students', 'lecturers', 'rooms', 'thesis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nim_student' => 'required|exists:students,nim',
        'ta_id' => 'required|exists:thesis,id_ta',
        'ketua_sidang' => 'required|exists:lecturers,nidn',
        'sekretaris' => 'required|exists:lecturers,nidn',
        'anggota' => 'required|exists:lecturers,nidn',
        'no_room' => [
            'required',
            function ($attribute, $value, $fail) {
                $room = Room::where('id_room', $value)->first();
                if (!$room || !$room->sesi) {
                    $fail('The selected room must have a valid session.');
                }
            },
        ],
        'date_session' => 'required|date',
    ]);

    try {
        DB::table('sessions')->insert([
            'nim_student' => $request->nim_student,
            'ta_id' => $request->ta_id,
            'ketua_sidang' => $request->ketua_sidang,
            'sekretaris' => $request->sekretaris,
            'anggota' => $request->anggota,
            'no_room' => $request->no_room,
            'date_session' => $request->date_session,
            'sesi' => Room::where('id_room', $request->no_room)->value('sesi'), // Menyimpan sesi
        ]);

        return redirect('/session')->with('success', 'Session added successfully.');
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['error' => 'Failed to add session. ' . $e->getMessage()]);
    }
}

    public function edit($id)
    {
        $data_sessions = DB::table('sessions')->where('id_session', $id)->first();
        $students = DB::table('students')->get();
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $thesis = DB::table('thesis')->get();

        return view('backend.form.formEditSession', compact('data_sessions', 'students', 'lecturers', 'rooms', 'thesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim_student' => 'required|exists:students,nim',
            'ta_id' => 'required|exists:thesis,id_ta',
            'ketua_sidang' => 'required|exists:lecturers,nidn',
            'sekretaris' => 'required|exists:lecturers,nidn',
            'anggota' => 'required|exists:lecturers,nidn',
            'no_room' => 'required|exists:rooms,id_room',
            'date_session' => 'required|date',
        ]);

        DB::table('sessions')->where('id_session', $id)->update([
            'nim_student' => $request->nim_student,
            'ta_id' => $request->ta_id,
            'ketua_sidang' => $request->ketua_sidang,
            'sekretaris' => $request->sekretaris,
            'anggota' => $request->anggota,
            'no_room' => $request->no_room,
            'date_session' => $request->date_session,
        ]);

        return redirect('/session')->with('success', 'Session updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('sessions')->where('id_session', $id)->delete();
        return redirect('/session')->with('success', 'Session deleted successfully.');
    }

    public function export_excel()
    {
        return Excel::download(new ExportSession, 'Sessions.xlsx');
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move(public_path('session_file'), $nama_file);

        Excel::import(new ImportSession, public_path('session_file/' . $nama_file));

        return back()->with('success', 'File imported successfully.');
    }
}
