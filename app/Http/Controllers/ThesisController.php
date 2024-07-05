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
            ->join('lecturers as pembimbing1', 'thesis.pembimbing1', '=', 'pembimbing1.id_lecturer')
            ->join('lecturers as pembimbing2', 'thesis.pembimbing2', '=', 'pembimbing2.id_lecturer')
            ->select(
                'thesis.*',
                'pembimbing1.name as pembimbing1_name',
                'pembimbing2.name as pembimbing2_name'
            )
            ->orderBy('id_ta')
            ->get();
            // dd($data_thesis);
        return view('backend.thesis', compact('data_thesis'));
    }

    public function create()
    {
        $lecturers = DB::table('lecturers')->get();
        return view('backend.form.formThesis', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'judul' => 'required',
            'tgl_pengajuan' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx|max:204800',
            'dokumen_pkl' => 'required|file|mimes:pdf,doc,docx|max:204800',
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:204800',
            'lembar_bimbingan' => 'required|file|mimes:pdf,doc,docx|max:204800',
            'pembimbing1' => 'required',
            'pembimbing2' => 'required',
        ]);
        
        try {
            // Handle main file
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('uploads/thesis', $filename, 'public');
        
            // Handle dokumen_pkl
            $dokumenPkl = $request->file('dokumen_pkl');
            $dokumenPklName = $dokumenPkl->getClientOriginalName();
            $dokumenPklPath = $dokumenPkl->storeAs('uploads/thesis', $dokumenPklName, 'public');
        
            // Handle proposal
            $proposal = $request->file('proposal');
            $proposalName = $proposal->getClientOriginalName();
            $proposalPath = $proposal->storeAs('uploads/thesis', $proposalName, 'public');
        
            // Handle lembar_bimbingan
            $lembarBimbingan = $request->file('lembar_bimbingan');
            $lembarBimbinganName = $lembarBimbingan->getClientOriginalName();
            $lembarBimbinganPath = $lembarBimbingan->storeAs('uploads/thesis', $lembarBimbinganName, 'public');
        
            // Save to database
            Thesis::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'judul' => $request->judul,
                'tgl_pengajuan' => $request->tgl_pengajuan,
                'file' => $path, // save the relative path for main file
                'file_name' => $filename,
                'dokumen_pkl' => $dokumenPklPath, // save the relative path for dokumen_pkl
                'dokumen_pkl_name' => $dokumenPklName,
                'proposal' => $proposalPath, // save the relative path for proposal
                'proposal_name' => $proposalName,
                'lembar_bimbingan' => $lembarBimbinganPath, // save the relative path for lembar_bimbingan
                'lembar_bimbingan_name' => $lembarBimbinganName,
                'pembimbing1' => $request->pembimbing1,
                'pembimbing2' => $request->pembimbing2,
            ]);
        
            

            return redirect('/thesis')->with('success', 'Thesis added successfully.');
        } catch (\Exception $e) {
            return redirect('/formThesis')->with('error', 'Error adding thesis: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $thesis = Thesis::where('id_ta', $id)->first();
        $lecturers = DB::table('lecturers')->get();
        return view('backend.form.formEditThesis', compact('thesis','lecturers'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'judul' => 'required',
        'tgl_pengajuan' => 'required',
        'file' => 'required|file|mimes:pdf,doc,docx|max:204800',
        'dokumen_pkl' => 'required|file|mimes:pdf,doc,docx|max:204800',
        'proposal' => 'required|file|mimes:pdf,doc,docx|max:204800',
        'lembar_bimbingan' => 'required|file|mimes:pdf,doc,docx|max:204800',
        'pembimbing1' => 'required',
        'pembimbing2' => 'required',
    ]);

    $thesis = Thesis::where('id_ta', $id)->first();

    $data = [
        'nim' => $request->nim,
        'nama' => $request->nama,
        'judul' => $request->judul,
        'tgl_pengajuan' => $request->tgl_pengajuan,
        'file' => $request->file,
        'dokumen_pkl' => $request->dokumen_pkl,
        'proposal' => $request->proposal,
        'lembar_bimbingan' => $request->lembar_bimbingan,
        'pembimbing1' => $request->pembimbing1,
        'pembimbing2' => $request->pembimbing2,
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
    $data = [
        'nim' => $request->nim,
        'nama' => $request->nama,
        'judul' => $request->judul,
        'tgl_pengajuan' => $request->tgl_pengajuan,
        'file' => $request->file,
        'dokumen_pkl' => $request->dokumen_pkl,
        'proposal' => $request->proposal,
        'lembar_bimbingan' => $request->lembar_bimbingan,
        'pembimbing1' => $request->pembimbing1,
        'pembimbing2' => $request->pembimbing2,
    ];
    
    if ($request->hasFile('file')) {
        if ($thesis->file) {
            Storage::disk('public')->delete($thesis->file);
        }
        $file = $request->file('file');
        $filePath = $file->store('uploads/thesis', 'public');
        $fileName = $file->getClientOriginalName();
    
        $data['file'] = $filePath;
        $data['file_name'] = $fileName;
    }
    
    if ($request->hasFile('dokumen_pkl')) {
        if ($thesis->dokumen_pkl) {
            Storage::disk('public')->delete($thesis->dokumen_pkl);
        }
        $dokumenPkl = $request->file('dokumen_pkl');
        $dokumenPklPath = $dokumenPkl->store('uploads/thesis', 'public');
        $dokumenPklName = $dokumenPkl->getClientOriginalName();
    
        $data['dokumen_pkl'] = $dokumenPklPath;
        $data['dokumen_pkl_name'] = $dokumenPklName;
    }
    
    if ($request->hasFile('proposal')) {
        if ($thesis->proposal) {
            Storage::disk('public')->delete($thesis->proposal);
        }
        $proposal = $request->file('proposal');
        $proposalPath = $proposal->store('uploads/thesis', 'public');
        $proposalName = $proposal->getClientOriginalName();
    
        $data['proposal'] = $proposalPath;
        $data['proposal_name'] = $proposalName;
    }
    
    if ($request->hasFile('lembar_bimbingan')) {
        if ($thesis->lembar_bimbingan) {
            Storage::disk('public')->delete($thesis->lembar_bimbingan);
        }
        $lembarBimbingan = $request->file('lembar_bimbingan');
        $lembarBimbinganPath = $lembarBimbingan->store('uploads/thesis', 'public');
        $lembarBimbinganName = $lembarBimbingan->getClientOriginalName();
    
        $data['lembar_bimbingan'] = $lembarBimbinganPath;
        $data['lembar_bimbingan_name'] = $lembarBimbinganName;
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

    public function show($id)
    {
        $thesis = Thesis::where('id_ta', $id)
            ->join('lecturers as pembimbing1', 'thesis.pembimbing1', '=', 'pembimbing1.id_lecturer')
            ->join('lecturers as pembimbing2', 'thesis.pembimbing2', '=', 'pembimbing2.id_lecturer')
            ->select(
                'thesis.*',
                'pembimbing1.name as pembimbing1_name',
                'pembimbing2.name as pembimbing2_name'
            )
            ->first();

        return view('backend.form.detailThesis', compact('thesis'));
    }

    public function download($file)
    {
        $path = storage_path('app/public/uploads/thesis/' . $file);
        
        if (file_exists($path)) {
            return response()->download($path);
        } else {
            return abort(404, 'File not found');
        }
    }

}
