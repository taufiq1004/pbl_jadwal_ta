<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Thesis;
use App\Models\Lecturer;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['thesis', 'pembimbing1'])->get();
        return view('backend.penilaian', compact('penilaians'));
    }

    public function create()
    {
        $theses = Thesis::all();
        $lecturers = Lecturer::all();
        return view('backend.form.formPenilaian', compact('theses', 'lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ta_id' => 'required|exists:thesis,id_ta',
            'jabatan' => 'required|in:Pembimbing1,Pembimbing2,KetuaSidang,SekretarisSidang,Penguji1,Penguji2',
            'pembimbing1_id' => 'required|exists:lecturers,id_lecturer',
            'presentasi_sikap_penampilan' => 'required|numeric|min:0|max:100',
            'presentasi_komunikasi_sistematika' => 'required|numeric|min:0|max:100',
            'presentasi_penguasaan_materi' => 'required|numeric|min:0|max:100',
            'makalah_identifikasi_masalah' => 'required|numeric|min:0|max:100',
            'makalah_relevansi_teori' => 'required|numeric|min:0|max:100',
            'makalah_metode_algoritma' => 'required|numeric|min:0|max:100',
            'makalah_hasil_pembahasan' => 'required|numeric|min:0|max:100',
            'makalah_kesimpulan_saran' => 'required|numeric|min:0|max:100',
            'makalah_bahasa_tata_tulis' => 'required|numeric|min:0|max:100',
            'produk_kesesuaian_fungsional' => 'required|numeric|min:0|max:100',
            'komentar' => 'nullable|string',
        ]);

        // Calculation of total_nilai remains the same

        Penilaian::create($request->all());

        return redirect()->route('backend.penilaian')->with('success', 'Penilaian berhasil disimpan.');
    }

    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $theses = Thesis::all();
        $lecturers = Lecturer::all();
        return view('backend.form.formEditPenilaian', compact('penilaian', 'theses', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ta_id' => 'required|exists:thesis,id_ta',
            'jabatan' => 'required|in:Pembimbing1,Pembimbing2,KetuaSidang,SekretarisSidang,Penguji1,Penguji2',
            'pembimbing1_id' => 'required|exists:lecturers,id_lecturer',
            'presentasi_sikap_penampilan' => 'required|numeric|min:0|max:100',
            'presentasi_komunikasi_sistematika' => 'required|numeric|min:0|max:100',
            'presentasi_penguasaan_materi' => 'required|numeric|min:0|max:100',
            'makalah_identifikasi_masalah' => 'required|numeric|min:0|max:100',
            'makalah_relevansi_teori' => 'required|numeric|min:0|max:100',
            'makalah_metode_algoritma' => 'required|numeric|min:0|max:100',
            'makalah_hasil_pembahasan' => 'required|numeric|min:0|max:100',
            'makalah_kesimpulan_saran' => 'required|numeric|min:0|max:100',
            'makalah_bahasa_tata_tulis' => 'required|numeric|min:0|max:100',
            'produk_kesesuaian_fungsional' => 'required|numeric|min:0|max:100',
            'komentar' => 'nullable|string',
        ]);

        $penilaian = Penilaian::findOrFail($id);

        $totalNilai = 
            ($request->presentasi_sikap_penampilan * 0.05) +
            ($request->presentasi_komunikasi_sistematika * 0.05) +
            ($request->presentasi_penguasaan_materi * 0.20) +
            ($request->makalah_identifikasi_masalah * 0.05) +
            ($request->makalah_relevansi_teori * 0.05) +
            ($request->makalah_metode_algoritma * 0.10) +
            ($request->makalah_hasil_pembahasan * 0.15) +
            ($request->makalah_kesimpulan_saran * 0.05) +
            ($request->makalah_bahasa_tata_tulis * 0.05) +
            ($request->produk_kesesuaian_fungsional * 0.25);

        $penilaian->update([
            'ta_id' => $request->ta_id,
            'jabatan' => $request->jabatan,
            'pembimbing1_id' => $request->pembimbing1_id,
            'presentasi_sikap_penampilan' => $request->presentasi_sikap_penampilan,
            'presentasi_komunikasi_sistematika' => $request->presentasi_komunikasi_sistematika,
            'presentasi_penguasaan_materi' => $request->presentasi_penguasaan_materi,
            'makalah_identifikasi_masalah' => $request->makalah_identifikasi_masalah,
            'makalah_relevansi_teori' => $request->makalah_relevansi_teori,
            'makalah_metode_algoritma' => $request->makalah_metode_algoritma,
            'makalah_hasil_pembahasan' => $request->makalah_hasil_pembahasan,
            'makalah_kesimpulan_saran' => $request->makalah_kesimpulan_saran,
            'makalah_bahasa_tata_tulis' => $request->makalah_bahasa_tata_tulis,
            'produk_kesesuaian_fungsional' => $request->produk_kesesuaian_fungsional,
            'total_nilai' => $totalNilai,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('backend.penilaian')->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect()->route('backend.penilaian')->with('success', 'Penilaian berhasil dihapus.');
    }
}

    // update and destroy methods remain the same
