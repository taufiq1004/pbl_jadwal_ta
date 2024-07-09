<?php

namespace App\Http\Controllers;

use App\Models\ValidasiTa;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiTaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan $user telah didefinisikan
        if (isset($user) && !is_null($user)) {
            // Query untuk mendapatkan data validasi TA
            $data_validasi_ta = Thesis::with('validasi')
            ->join('lecturers as pembimbing1', 'thesis.pembimbing1', '=', 'pembimbing1.id_lecturer')
            ->join('lecturers as pembimbing2', 'thesis.pembimbing2', '=', 'pembimbing2.id_lecturer')
                ->whereHas('validasi', function ($query) use ($user) {
                    $query->where('pembimbing1.name', $user->name)
                        ->orWhere('pembimbing2.name', $user->name);
                })
                ->get();
        } else {
            // Handle jika $user tidak didefinisikan atau null
            $data_validasi_ta = collect(); // Mengembalikan collection kosong
        }

        // $data_validasi_ta = ValidasiTa::whereHas('thesis', function($query) use ($user) {
        //     $query->where('pembimbing1', $user->id)->orWhere('pembimbing2', $user->id);
        // })->with('thesis')->get();
        return view('backend.validasiTa', compact('data_validasi_ta'));
    }

    public function create(Request $request)
    {
        $taId = $request->query('ta_id');
        $nim = $request->query('nim');
        $namaMahasiswa = $request->query('nama_mahasiswa');
        $judul = $request->query('judul');

        return view('admin.validasi_ta.create', compact('taId', 'nim', 'namaMahasiswa', 'judul'));
    }

    // Menyimpan validasi baru ke database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_validasi' => 'required|date',
        ]);

        // Temukan data validasi berdasarkan ID
        $validasi = ValidasiTa::find($id);

        if ($validasi) {
            // Toggle status
            $newStatus = ($validasi->status == 'Valid') ? 'Tidak Valid' : 'Valid';

            // Update data
            $validasi->update([
                'status' => $newStatus,
                'tgl_validasi' => $request->tanggal_validasi,
            ]);

            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('validasiTa.index')->with('success', 'Status validasi berhasil diubah.');
        }

        // Redirect dengan pesan error jika data tidak ditemukan
        return redirect()->route('validasiTa.index')->with('error', 'Data validasi tidak ditemukan.');
    }
}
