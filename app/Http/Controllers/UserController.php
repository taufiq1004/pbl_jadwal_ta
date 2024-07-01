<?php

namespace App\Http\Controllers;
use App\Exports\ExportUser;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;

class UserController extends Controller
{
    public function index()
    {
        $data_user = DB::table('users')
            ->orderBy('id')
            ->get();
        return view('backend.users', compact('data_user'));
    }

    public function create()
    {
        return view('backend.form.formUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required|in:admin,mahasiswa,dosen',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users')->with('success', 'User added successfully.');
    }
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('backend.form.userDetail', compact('user'));
}



    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.form.formEditUser', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'role' => 'required|in:admin,mahasiswa,dosen',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    $data = [
        'name' => $request->name,
        'role' => $request->role,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    User::where('id', $id)->update($data);

    return redirect('/users')->with('success', 'User updated successfully.');
}


    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }

  
    public function export_excel()
    {
        dd('export_excel method called'); // Debugging
        return Excel::download(new ExportUser, 'Users.xlsx');
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $name_file = rand() . $file->getClientOriginalName();
        $file->move(public_path('file_user'), $name_file);

        Excel::import(new ImportUser, public_path('file_user/' . $name_file));

        return back()->with('success', 'File has been imported successfully.');
    }
}
