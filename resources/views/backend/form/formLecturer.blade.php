@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Tambah Data Dosen</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="/lecturers/store" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_lecturer" class="form-label">Id Lecturer</label>
                                    <input type="text" class="form-control" id="id_lecturer" name="id_lecturer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nidn" class="form-label">Nidn</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi_id" class="form-label">Prodi</label>
                                    <select class="form-control" id="prodi_id" name="prodi_id" required>
                                        <option value="">Select Prodi</option>
                                        @foreach($data_prodi as $prodi)
                                            <option value="{{ $prodi->id_prodi }}">{{ $prodi->name }}</option>
                                        @endforeach
                                    </select>
                                <!-- Add other fields if necessary -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/lecturers" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
