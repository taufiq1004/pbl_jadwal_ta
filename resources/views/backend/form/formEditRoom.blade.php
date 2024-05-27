@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Edit Data Prodi</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('room.update', $room->id_room) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="id_room" class="form-label">Id Room</label>
                                    <input type="text" class="form-control" id="id_room" name="id_room" value="{{ $room->id_room }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_room" class="form-label">No Room</label>
                                    <input type="text" class="form-control" id="no_room" name="no_room" value="{{ $room->no_room }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="times" class="form-label">Times</label>
                                    <input type="text" class="form-control" id="times" name="times" value="{{ $room->times }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('backend.room') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
