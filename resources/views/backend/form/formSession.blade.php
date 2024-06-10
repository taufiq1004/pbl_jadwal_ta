@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Sidang</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('session.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_session" class="form-label">ID Session</label>
                                <input type="text" class="form-control" id="id_session" name="id_session" required>
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
                                <label for="ta_id" class="form-label">Judul TA</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option selected disabled>Select Judul</option>
                                    @foreach ($thesis as $thesis)
                                        <option value="{{ $thesis->id_ta }}">{{ $thesis->judul }}</option>
                                    @endforeach
                                </select>
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
                            <div class="mb-3">
                                <label for="ketua_sidang" class="form-label">Ketua Sidang</label>
                                <select class="form-select" id="ketua_sidang" name="ketua_sidang" required>
                                    <option selected disabled>Select Ketua Sidang</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sekretaris" class="form-label">Sekretaris</label>
                                <select class="form-select" id="sekretaris" name="sekretaris" required>
                                    <option selected disabled>Select Sekretaris</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji1" class="form-label">Penguji 1</label>
                                <select class="form-select" id="penguji1" name="penguji1" required>
                                    <option selected disabled>Select Penguji 1</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji2" class="form-label">Penguji 2</label>
                                <select class="form-select" id="penguji2" name="penguji2" required>
                                    <option selected disabled>Select Penguji 2</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_room" class="form-label">No Ruangan</label>
                                <select class="form-select" id="no_room" name="no_room" required>
                                    <option selected disabled>Select No Ruangan</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id_room }}">{{ $room->no_room }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date_session" class="form-label">Tanggal sidang</label>
                                <input type="date" class="form-control" id="date_session" name="date_session" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.session') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
