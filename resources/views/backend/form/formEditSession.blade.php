@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Sidang</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @if ($data_sessions)
                            <form action="{{ route('session.update', $data_sessions->id_session) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nim_student" class="form-label">Nama Siswa</label>
                                    <select class="form-select" id="nim_student" name="nim_student" required>
                                        <option selected disabled>Pilih Siswa</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->nim }}" {{ $student->nim == $data_sessions->nim_student ? 'selected' : '' }}>
                                                {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ta_id" class="form-label">Judul TA</label>
                                    <select class="form-select" id="ta_id" name="ta_id" required>
                                        <option selected disabled>Pilih Judul</option>
                                        @foreach ($thesis as $thesisItem)
                                            <option value="{{ $thesisItem->id_ta }}" {{ $thesisItem->id_ta == $data_sessions->ta_id ? 'selected' : '' }}>
                                                {{ $thesisItem->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ketua_sidang" class="form-label">Ketua Sidang</label>
                                    <select class="form-select" id="ketua_sidang" name="ketua_sidang" required>
                                        <option selected disabled>Pilih Ketua Sidang</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $data_sessions->ketua_sidang ? 'selected' : '' }}>
                                                {{ $lecturer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sekretaris" class="form-label">Sekretaris</label>
                                    <select class="form-select" id="sekretaris" name="sekretaris" required>
                                        <option selected disabled>Pilih Sekretaris</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $data_sessions->sekretaris ? 'selected' : '' }}>
                                                {{ $lecturer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="anggota" class="form-label">Anggota</label>
                                    <select class="form-select" id="anggota" name="anggota" required>
                                        <option selected disabled>Pilih Anggota</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $data_sessions->anggota ? 'selected' : '' }}>
                                                {{ $lecturer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="no_room" class="form-label">Nomor Ruangan</label>
                                    <select class="form-select" id="no_room" name="no_room" required>
                                        <option selected disabled>Pilih Ruangan</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id_room }}" {{ $room->id_room == $data_sessions->no_room ? 'selected' : '' }}>
                                                {{ $room->no_room }} - sesi {{ $room->sesi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date_session" class="form-label">Tanggal Sidang</label>
                                    <input type="date" class="form-control" id="date_session" name="date_session" value="{{ $data_sessions->date_session }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('session.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        @else
                            <p>Data tidak ditemukan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
