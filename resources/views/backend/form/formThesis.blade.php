@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_ta" class="form-label">Id TA</label>
                                <input type="text" class="form-control" id="id_ta" name="id_ta" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim_student" class="form-label">Name Student</label>
                                <select class="form-select" id="nim_student" name="nim_student" required>
                                    <option selected disabled>Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nim }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul TA</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File Baru</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                                <select class="form-select" id="pembimbing1" name="pembimbing1" required>
                                    <option selected disabled>Select Pembimbing 1</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing2" class="form-label">Pembimbing 2</label>
                                <select class="form-select" id="pembimbing2" name="pembimbing2" required>
                                    <option selected disabled>Select Pembimbing 2</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.thesis') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
