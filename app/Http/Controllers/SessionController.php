<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
use App\Imports\ImportSession;
use App\Exports\ExportSession;
use App\Models\Room;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;

class SessionController extends Controller
{
    public function index()
    {
        $data_sessions = Session::with('thesis', 'penilaians','penilaianKetuaSidang','rooms')
        ->join('lecturers as ketua_sidang', 'sessions.ketua_sidang', '=', 'ketua_sidang.id_lecturer')
        ->join('lecturers as sekretaris', 'sessions.sekretaris', '=', 'sekretaris.id_lecturer')
        ->join('lecturers as penguji1', 'sessions.penguji1', '=', 'penguji1.id_lecturer')
        ->join('lecturers as penguji2', 'sessions.penguji2', '=', 'penguji2.id_lecturer')
        ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
        ->join('thesis as judul_ta', 'sessions.ta_id', '=', 'judul_ta.id_ta')
        ->select(
            'sessions.*',
            'judul_ta.nama as student_name',
            'judul_ta.judul as judul_ta',
            'ketua_sidang.name as ketua_name',
            'sekretaris.name as sekretaris_name',
            'penguji1.name as penguji1_name',
            'penguji2.name as penguji2_name',
            'rooms.no_room',
            'rooms.sesi'
        )
        ->orderBy('sessions.id_session')
        ->paginate(10);
        // dd($data_sessions);

    return view('backend.session', compact('data_sessions'));
}

    public function create()
    {
        $data_sessions = DB::table('sessions')->get();
        $thesis = DB::table('thesis')->get();
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $students = DB::table('students')->get();

        return view('backend.form.formSession', compact('thesis', 'lecturers', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ta_id' => 'required|exists:thesis,id_ta',
            'ketua_sidang' => 'required|exists:lecturers,id_lecturer',
            'sekretaris' => 'required|exists:lecturers,id_lecturer',
            'penguji1' => 'required|exists:lecturers,id_lecturer',
            'penguji2' => 'required|exists:lecturers,id_lecturer',
            'no_room' => [
                'required',
                function ($attribute, $value, $fail) {
                    $room = Room::where('id_room', $value)->where('sesi', '!=', '')->first();
                    if (!$room) {
                        $fail('The selected room must have a valid session.');
                    }
                },
            ],
            'date_session' => 'required|date',
        ]);

        try {
            Session::create([
                'ta_id' => $request->ta_id,
                'ketua_sidang' => $request->ketua_sidang,
                'sekretaris' => $request->sekretaris,
                'penguji1' => $request->penguji1,
                'penguji2' => $request->penguji2,
                'no_room' => $request->no_room,
                'date_session' => $request->date_session,
                'sesi' => Room::where('id_room', $request->no_room)->value('sesi'),
            ]);

            return redirect('/session')->with('success', 'Session added successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to add session. ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $data_sessions = Session::findOrFail($id);
        $lecturers = DB::table('lecturers')->get();
        $rooms = DB::table('rooms')->get();
        $thesis = DB::table('thesis')->get();

        return view('backend.form.formEditSession', compact('data_sessions', 'lecturers', 'rooms', 'thesis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ta_id' => 'required|exists:thesis,id_ta',
            'ketua_sidang' => 'required|exists:lecturers,id_lecturer',
            'sekretaris' => 'required|exists:lecturers,id_lecturer',
            'penguji1' => 'required|exists:lecturers,id_lecturer',
            'penguji2' => 'required|exists:lecturers,id_lecturer',
            'no_room' => 'required|exists:rooms,id_room',
            'date_session' => 'required|date',
        ]);

        $session = Session::findOrFail($id);
        $session->update([
            'ta_id' => $request->ta_id,
            'ketua_sidang' => $request->ketua_sidang,
            'sekretaris' => $request->sekretaris,
            'penguji1' => $request->penguji1,
            'penguji2' => $request->penguji2,
            'no_room' => $request->no_room,
            'date_session' => $request->date_session,
        ]);

        return redirect('/session')->with('success', 'Session updated successfully.');
    }

    public function show($id)
{
    $session = Session::with('thesis', 'penilaians', 'penilaianKetuaSidang', 'rooms')
        ->join('lecturers as ketua_sidang', 'sessions.ketua_sidang', '=', 'ketua_sidang.id_lecturer')
        ->join('lecturers as sekretaris', 'sessions.sekretaris', '=', 'sekretaris.id_lecturer')
        ->join('lecturers as penguji1', 'sessions.penguji1', '=', 'penguji1.id_lecturer')
        ->join('lecturers as penguji2', 'sessions.penguji2', '=', 'penguji2.id_lecturer')
        ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
        ->join('thesis as judul_ta', 'sessions.ta_id', '=', 'judul_ta.id_ta')
        ->select(
            'sessions.*',
            'judul_ta.nama as student_name',
            'judul_ta.judul as judul_ta',
            'ketua_sidang.name as ketua_name',
            'sekretaris.name as sekretaris_name',
            'penguji1.name as penguji1_name',
            'penguji2.name as penguji2_name',
            'rooms.no_room',
            'rooms.sesi'
        )
        ->where('sessions.id_session', $id)
        ->firstOrFail();

    return view('backend.session_show', compact('session'));
}


    public function destroy($id)
    {
        Session::findOrFail($id)->delete();
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

    public function print($id)
    {
        $session = Session::with('thesis', 'penilaians')
            ->join('lecturers as ketua_sidang', 'sessions.ketua_sidang', '=', 'ketua_sidang.id_lecturer')
            ->join('lecturers as sekretaris', 'sessions.sekretaris', '=', 'sekretaris.id_lecturer')
            ->join('lecturers as penguji1', 'sessions.penguji1', '=', 'penguji1.id_lecturer')
            ->join('lecturers as penguji2', 'sessions.penguji2', '=', 'penguji2.id_lecturer')
            ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
            ->join('thesis as judul_ta', 'sessions.ta_id', '=', 'judul_ta.id_ta')
            ->where('sessions.id_session', $id)
            ->select(
                'sessions.*',
                'judul_ta.nama as student_name',
                'judul_ta.judul as judul_ta',
                'ketua_sidang.name as ketua_name',
                'sekretaris.name as sekretaris_name',
                'penguji1.name as penguji1_name',
                'penguji2.name as penguji2_name',
                'rooms.no_room',
                'rooms.sesi'
            )
            ->firstOrFail();

        $data = [
            'session' => $session,
            'judul_ta' => $session->judul_ta ?? '-',
            'nama_mahasiswa' => $session->student_name ?? '-',
            'ketua_sidang' => $session->ketua_name,
            'sekretaris_sidang' => $session->sekretaris_name,
            'penguji_1' => $session->penguji1_name,
            'penguji_2' => $session->penguji2_name,
            'ruangan' => $session->no_room ?? '-',
            'tanggal_sidang' => Carbon::parse($session->date_session)->format('d-m-Y'),
            'total_nilai_ketua' => $session->penilaians()->where('jabatan', 'KetuaSidang')->first()->total_nilai ?? 0,
            'total_nilai_sekretaris' => $session->penilaians()->where('jabatan', 'SekretarisSidang')->first()->total_nilai ?? 0,
            'total_nilai_penguji1' => $session->penilaians()->where('jabatan', 'Penguji1')->first()->total_nilai ?? 0,
            'total_nilai_penguji2' => $session->penilaians()->where('jabatan', 'Penguji2')->first()->total_nilai ?? 0,
        ];

        $pdf = PDF::loadView('backend.form.print', $data);

        return $pdf->download('berita_acara_sidang.pdf');
    }

//     public function report()
// {
//     $data_sessions = Session::with('thesis', 'penilaians', 'penilaianKetuaSidang', 'rooms')
//         ->join('lecturers as ketua_sidang', 'sessions.ketua_sidang', '=', 'ketua_sidang.id_lecturer')
//         ->join('lecturers as sekretaris', 'sessions.sekretaris', '=', 'sekretaris.id_lecturer')
//         ->join('lecturers as penguji1', 'sessions.penguji1', '=', 'penguji1.id_lecturer')
//         ->join('lecturers as penguji2', 'sessions.penguji2', '=', 'penguji2.id_lecturer')
//         ->join('rooms', 'sessions.no_room', '=', 'rooms.id_room')
//         ->join('thesis as judul_ta', 'sessions.ta_id', '=', 'judul_ta.id_ta')
//         ->select(
//             'sessions.*',
//             'judul_ta.nama as student_name',
//             'judul_ta.judul as judul_ta',
//             'ketua_sidang.name as ketua_name',
//             'sekretaris.name as sekretaris_name',
//             'penguji1.name as penguji1_name',
//             'penguji2.name as penguji2_name',
//             'rooms.no_room',
//             'rooms.sesi'
//         )
//         ->orderBy('sessions.id_session')
//         ->get();

//     return view('backend.form.report',$data_sessions);
// }

}
