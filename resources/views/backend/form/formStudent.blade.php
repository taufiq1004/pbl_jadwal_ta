@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Mahasiswa</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_student" class="form-label">Id Student</label>
                                <input type="text" class="form-control" id="id_student" name="id_student" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodi_id" class="form-label">Program</label>
                                <select class="form-select" id="prodi_id" name="prodi_id" required>
                                    <option selected disabled>Select Program Study</option>
                                    @foreach ($prodi as $program)
                                    <option value="{{ $program->id_prodi }}">{{ $program->name_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="force" class="form-label">Force</label>
                                <input type="text" class="form-control" id="force" name="force" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.student') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
