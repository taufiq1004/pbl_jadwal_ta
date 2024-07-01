<?php
namespace App\Http\Controllers;

use App\Exports\ExportDosen;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportDosen;

class LecturerController extends Controller
{
    public function index()
    {
        $data_lecturer = DB::table('lecturers')
            ->orderBy('nidn') // Order by id_prodi from smallest to largest
            ->get();
        return view('backend.lecturer', compact('data_lecturer'));
    }

    public function create()
    {
        return view('backend.formLecturer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            
        ]);

        Lecturer::create($request->all());
        return redirect('/lecturers')->with('success', 'Lecturer added successfully.');
    }

    public function edit($id)
    {
        $lecturer= lecturer::where('nidn',$id)->first();
        return view('backend.form.formEditLecturer', compact('lecturer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            
        ]);

        $data=[
            'nidn'=> $request->nidn,
            'name'=> $request->name,
            'gender'=> $request->gender,
            'email'=> $request->email,
           
        ];
        DB::table('lecturers')->where('nidn',$id)->update($data);
        return redirect('/lecturers')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy($id)
    {
        DB::table ('lecturers')->where('nidn',$id)->delete();
        return redirect('/lecturers')->with('success', 'Lecturer deleted successfully.');
    }
    public function show($id)
{
    $lecturer = Lecturer::where('nidn', $id)->first();
    return view('backend.form.detailLecturer', compact('lecturer'));
}

    function export_excel(){
        return Excel ::download(new ExportDosen,"Lecture.xlsx");
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $name_file = rand() . $file->getClientOriginalName();
        $file->move(public_path('file_lecturer'), $name_file);

        Excel::import(new ImportDosen, public_path('file_lecturer/' . $name_file));

        return back()->with('success', 'File has been imported successfully.');
    }
}
