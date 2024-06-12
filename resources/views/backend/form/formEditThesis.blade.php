@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('thesis.update', $thesis->id_ta) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_ta" class="form-label">Id TA</label>
                                <input type="text" class="form-control" id="id_ta" name="id_ta" value="{{ $thesis->id_ta }}" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nim_student" class="form-label">Name Student</label>
                                <select class="form-select" id="nim_student" name="nim_student" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nim }}" {{ $student->nim == $thesis->nim_student ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul TA</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $thesis->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="{{ $thesis->tgl_pengajuan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File Baru</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                                <select class="form-select" id="pembimbing1" name="pembimbing1" required>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $thesis->pembimbing1 ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing2" class="form-label">Pembimbing 2</label>
                                <select class="form-select" id="pembimbing2" name="pembimbing2" required>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $thesis->pembimbing2 ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('thesis.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
