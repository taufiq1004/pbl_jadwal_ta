@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Dosen</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('lecturer.store') }}" method="POST">
                            @csrf
        
                            <div class="mb-3">
                                <label for="nidn" class="form-label">Nidn</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="laki-laki" name="gender" value="Laki-Laki" required>
                                    <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="perempuan" name="gender" value="Perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.lecturer') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
