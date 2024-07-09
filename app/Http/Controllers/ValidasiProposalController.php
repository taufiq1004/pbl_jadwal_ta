<?php

namespace App\Http\Controllers;

use App\Models\ValidasiTa;
use Illuminate\Http\Request;

class ValidasiProposalController extends Controller
{
    //
    public function create(Request $request)
    {
        $taId = $request->query('ta_id');
        $nim = $request->query('nim');
        $namaMahasiswa = $request->query('nama_mahasiswa');
        $judul = $request->query('judul');

        return view('admin.validasi_ta.create', compact('taId', 'nim', 'namaMahasiswa', 'judul'));
    }

    // Menyimpan validasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:tugas_akhirs,nim',
            'ta_id' => 'required|exists:tugas_akhirs,id_ta',
            'status_validasi' => 'required|in:Valid,Tidak Valid,Pending',
            'tanggal_validasi' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        // Lanjutkan dengan menyimpan validasi tugas akhir baru
        ValidasiTa::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'ta_id' => $request->ta_id,
            'status_validasi' => $request->status_validasi,
            'tanggal_validasi' => $request->tanggal_validasi,
            'catatan' => $request->catatan,
        ]);

        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('admin.tugas_akhir.index')->with('success', 'Validasi Tugas Akhir berhasil disimpan.');
    }
}
