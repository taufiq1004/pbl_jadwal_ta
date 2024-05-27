@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Edit Data  Lecturer</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('lecturer.update', $lecturer->id_lecturer) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="id_lecturer" class="form-label">Id Lecturer</label>
                                    <input type="text" class="form-control" id="id_lecturer" name="id_lecturer" value="{{ $lecturer->id_lecturer }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nidn" class="form-label">Nidn</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $lecturer->nidn }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name Lecturer</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $lecturer->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $lecturer->email }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{ $lecturer->position }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('backend.lecturer') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
