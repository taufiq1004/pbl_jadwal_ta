@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Sidang</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('session.update', $data_sessions->id_session) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="ta_id" class="form-label">Judul TA</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option disabled>Pilih Judul</option>
                                    @foreach ($thesis as $thesisItem)
                                        <option value="{{ $thesisItem->id_ta }}" {{ $data_sessions->ta_id == $thesisItem->id_ta ? 'selected' : '' }}>
                                            {{ $thesisItem->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" id="student_id" name="student_id" required>
                                    <option disabled>Pilih Siswa</option>
                                    {{-- Options will be populated dynamically --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ketua_sidang" class="form-label">Ketua Sidang</label>
                                <select class="form-select" id="ketua_sidang" name="ketua_sidang" required>
                                    <option disabled>Pilih Ketua Sidang</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}" {{ $data_sessions->ketua_sidang == $lecturer->id_lecturer ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sekretaris" class="form-label">Sekretaris</label>
                                <select class="form-select" id="sekretaris" name="sekretaris" required>
                                    <option disabled>Pilih Sekretaris</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}" {{ $data_sessions->sekretaris == $lecturer->id_lecturer ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji1" class="form-label">Penguji 1</label>
                                <select class="form-select" id="penguji1" name="penguji1" required>
                                    <option disabled>Pilih Penguji 1</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}" {{ $data_sessions->penguji1 == $lecturer->id_lecturer ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji2" class="form-label">Penguji 2</label>
                                <select class="form-select" id="penguji2" name="penguji2" required>
                                    <option disabled>Pilih Penguji 2</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}" {{ $data_sessions->penguji2 == $lecturer->id_lecturer ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_room" class="form-label">Nomor Ruangan</label>
                                <select class="form-select" id="no_room" name="no_room" required>
                                    <option disabled>Pilih Ruangan</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id_room }}" {{ $data_sessions->no_room == $room->id_room ? 'selected' : '' }}>
                                            {{ $room->no_room }} - {{ $room->sesi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date_session" class="form-label">Tanggal Sidang</label>
                                <input type="date" class="form-control" id="date_session" name="date_session" value="{{ $data_sessions->date_session }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thesisData = @json($thesis);
        const studentSelect = document.getElementById('student_id');
        const taSelect = document.getElementById('ta_id');

        function populateStudentSelect(selectedTaId) {
            studentSelect.innerHTML = '<option disabled>Pilih Siswa</option>';
            thesisData.forEach(function (thesisItem) {
                if (thesisItem.id_ta == selectedTaId) {
                    const option = document.createElement('option');
                    option.value = thesisItem.id_ta;
                    option.text = thesisItem.nama;
                    option.selected = true;
                    studentSelect.appendChild(option);
                }
            });
        }

        taSelect.addEventListener('change', function () {
            populateStudentSelect(this.value);
        });

        // Initial population
        populateStudentSelect(taSelect.value);
    });
</script>

@endsection
