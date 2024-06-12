@extends('layouts.backend.template')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Edit Data Sidang</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('session.update', $session->id_session) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="id_session" class="form-label">Id Session</label>
                                    <input type="text" class="form-control" id="id_session" name="id_session" value="{{ $session->id_session }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nim_student" class="form-label">Name Student</label>
                                    <input type="text" class="form-control" id="nim_student" name="nim_student" value="{{ $session->nim_student }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="ta_id" class="form-label">Judul TA</label>
                                    <input type="text" class="form-control" id="ta_id" name="ta_id" value="{{ $session->ta_id }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                                    <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" value="{{ $session->pembimbing1 }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Pembimbing 2</label>
                                    <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" value="{{ $session->pembimbing2 }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="ketua_sidang" class="form-label">Ketua Sidang</label>
                                    <input type="text" class="form-control" id="ketua_sidang" name="ketua_sidang" value="{{ $session->ketua_sidang }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sekretaris" class="form-label">Sekretaris</label>
                                    <input type="text" class="form-control" id="sekretaris" name="sekretaris" value="{{ $session->sekretaris }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penguji1" class="form-label">Penguji 1</label>
                                    <input type="text" class="form-control" id="penguji1" name="penguji1" value="{{ $session->penguji1 }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penguji2" class="form-label">Penguji 2</label>
                                    <input type="text" class="form-control" id="penguji2" name="penguji2" value="{{ $session->penguji2 }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_room" class="form-label">No Room</label>
                                    <input type="text" class="form-control" id="no_room" name="no_room" value="{{ $session->no_room }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="date_session" class="form-label">Tanggal Sidang</label>
                                    <input type="text" class="form-control" id="date_session" name="date_session" value="{{ $session->date_session }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('backend.session') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
