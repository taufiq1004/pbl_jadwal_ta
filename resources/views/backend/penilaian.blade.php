@extends('layouts.backend.template')
@section('content')
<!-- Page Heading -->
<h5 class="card-title fw-semibold mb-4">Data Penilaian</h5>
<div class="container-fluid">
    <!-- DataPenilaian -->
    <div class="card shadow mb-4">
        <div>
            <a href="{{ route('penilaian.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-info">
                            <th>No</th>
                            <th>Materi Penilaian</th>
                            <th>Bobot(%)</th>
                            <th>Skor</th>
                            <th>Revisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaians as $penilaian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penilaian->materi_penilaian }}</td>
                            <td>{{ $penilaian->bobot }}</td>
                            <td>{{ $penilaian->skor }}</td>
                            <td>{{ $penilaian->revisi ?? 'Tidak ada' }}</td>
                            <td>
                                <form action="{{ route('penilaian.edit', $penilaian->id_penilaian) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-edit"></i> Update
                                    </button>
                                </form>
                                <form action="{{ route('penilaian.destroy', $penilaian->id_penilaian) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
