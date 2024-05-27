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
                            <form action="{{ route('prodi.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_prodi" class="form-label">ID Prodi</label>
                                    <input type="text" class="form-control" id="id_prodi" name="id_prodi" required>
                                </div>
                               
                                <div class="mb-3">
                                    <label for="name_prodi" class="form-label">Name Prodi</label>
                                    <input type="text" class="form-control" id="name_prodi" name="name_prodi" required>
                                </div>
                                <!-- Add other fields if necessary -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('backend.prodi') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
