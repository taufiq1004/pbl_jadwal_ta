<?php
namespace App\Http\Controllers;

use App\Exports\ExportStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportStudent;

class StudentController extends Controller
{
    public function index()
    {
        $data_student = DB::table('students')
            ->join('prodis', 'students.prodi_id', '=', 'prodis.id_prodi')
            ->select('students.*', 'prodis.name_prodi as prodi_name')
            ->orderBy('nim')
            ->get();
        return view('backend.student', compact('data_student'));
    }

    public function create()
    {
        $prodi = DB::table('prodis')->get();
        return view('backend.form.formStudent', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'prodi_id' => 'required',
            'force' => 'required',
        ]);

        Student::create($request->all());
        return redirect('/students')->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student = Student::where('nim', $id)->first();
        $prodi = DB::table('prodis')->get();
        return view('backend.form.formEditStudent', compact('student', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'prodi_id' => 'required',
            'force' => 'required',
        ]);

        $data = [
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi_id' => $request->prodi_id,
            'force' => $request->force,
        ];
        DB::table('students')->where('nim', $id)->update($data);
        return redirect('/students')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('students')->where('nim', $id)->delete();
        return redirect('/students')->with('success', 'Student deleted successfully.');
    }

    function export_excel()
    {
        return Excel::download(new ExportStudent, "Student.xlsx");
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $name_file = rand() . $file->getClientOriginalName();
        $file->move(public_path('file_student'), $name_file);

        Excel::import(new ImportStudent, public_path('file_student/' . $name_file));

        return back()->with('success', 'File has been imported successfully.');
    }
}
