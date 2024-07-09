@extends('layouts.backend.template')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Penilaian</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('penilaian.create') }}" class="btn btn-primary mb-3">Tambah Penilaian</a>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-bordered">
                <tr class="table-info">
                    <th>ID</th>
                    <th>Tugas Akhir</th>
                    <th>Jabatan</th>
                    <th>Dosen</th>
                    <th>Total Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penilaians as $penilaian)
                    <tr>
                        <td>{{ $penilaian->id }}</td>
                        <td>{{ $penilaian->thesis->judul }}</td>
                        <td>{{ $penilaian->jabatan }}</td>
                        <td>{{ optional($penilaian->pembimbing1)->name }}</td> <!-- Updated line -->
                        <td>{{ $penilaian->total_nilai }}</td>
                        <td>
                            <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
