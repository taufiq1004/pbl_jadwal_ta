@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Edit Data Sesi</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('sesi.update', $sesi->sesi) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="sesi" class="form-label">Sesi</label>
                                    <input type="text" class="form-control" id="sesi" name="sesi" value="{{ $sesi->sesi}}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('backend.sesi') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
