@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Tesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td>{{ $thesis->id_ta }}</td>
                            </tr>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td>{{ $thesis->student_name }}</td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td>{{ $thesis->judul }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>{{ $thesis->tgl_pengajuan }}</td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td>
                                    <a href="{{ Storage::url($thesis->file) }}" class="btn btn-success" download>
                                        <i class="fas fa-download"></i> Unduh
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Pembimbing 1</th>
                                <td>{{ $thesis->pembimbing1_name }}</td>
                            </tr>
                            <tr>
                                <th>Pembimbing 2</th>
                                <td>{{ $thesis->pembimbing2_name }}</td>
                            </tr>
                        </table>
                        <a href="{{ url('/thesis') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
