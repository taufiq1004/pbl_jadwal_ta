<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Thesis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function index()
    {
        $data_thesis = DB::table('thesis')
            ->join('students', 'thesis.nim_student', '=', 'students.nim')
            ->select('thesis.*', 'students.name as name_student')
            ->orderBy('id_ta')
            ->get();
        return view('backend.thesis', compact('data_thesis'));
    }

    public function create()
    {
        $students = DB::table('students')->get();
        return view('backend.form.formThesis', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ta' => 'required',
            'nim_student' => 'required',
            'judul' => 'required',
            'tgl_pengajuan' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public');
            $fileName = $file->getClientOriginalName();

            Thesis::create([
                'id_ta' => $request->id_ta,
                'nim_student' => $request->nim_student,
                'judul' => $request->judul,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'file' => $filePath,
                'file_name' => $fileName,
            ]);

            return redirect('/thesis')->with('success', 'Thesis added successfully.');
        } catch (\Exception $e) {
            return redirect('/formThesis')->with('error', 'Error adding thesis: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $thesis = Thesis::where('id_ta', $id)->first();
        $students = DB::table('students')->get();
        return view('backend.form.formEditThesis', compact('thesis', 'students'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nim_student' => 'required',
        'judul' => 'required',
        'tgl_pengajuan' => 'required',
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    $thesis = Thesis::where('id_ta', $id)->first();

    $data = [
        'nim_student' => $request->nim_student,
        'judul' => $request->judul,
        'tgl_pengajuan' => $request->tgl_pengajuan,
    ];

    if ($request->hasFile('file')) {
        if ($thesis->file) {
            Storage::disk('public')->delete($thesis->file);
        }
        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');
        $fileName = $file->getClientOriginalName();

        $data['file'] = $filePath;
        $data['file_name'] = $fileName;
    }

    DB::table('thesis')->where('id_ta', $id)->update($data);

    return redirect('/thesis')->with('success', 'Thesis updated successfully.');
}


    public function destroy($id)
    {
        $thesis = Thesis::where('id_ta', $id)->first();
        if ($thesis->file) {
            Storage::disk('public')->delete($thesis->file);
        }

        DB::table('thesis')->where('id_ta', $id)->delete();
        return redirect('/thesis')->with('success', 'Thesis deleted successfully.');
    }
}
