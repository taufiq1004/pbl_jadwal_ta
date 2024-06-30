@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Tambah Data Room</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('room.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_room" class="form-label">Id Room</label>
                                    <input type="text" class="form-control" id="id_room" name="id_room" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_room" class="form-label">No Room</label>
                                    <input type="text" class="form-control" id="no_room" name="no_room" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sesi" class="form-label">Sesi</label>
                                    <input type="text" class="form-control" id="sesi" name="sesi" required>
                                </div>
                                <!-- Add other fields if necessary -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('backend.room') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
