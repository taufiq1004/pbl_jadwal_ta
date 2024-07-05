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
                                <label for="ta_id" class="form-label">Judul TA</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option selected disabled>Pilih Judul</option>
                                    @foreach ($thesis as $thesisItem)
                                        <option value="{{ $thesisItem->id_ta }}">{{ $thesisItem->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" id="student_id" name="student_id" required>
                                    <option selected disabled>Pilih Siswa</option>
                                    {{-- Options will be populated dynamically --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ketua_sidang" class="form-label">Ketua Sidang</label>
                                <select class="form-select" id="ketua_sidang" name="ketua_sidang" required>
                                    <option selected disabled>Pilih Ketua Sidang</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sekretaris" class="form-label">Sekretaris</label>
                                <select class="form-select" id="sekretaris" name="sekretaris" required>
                                    <option selected disabled>Pilih Sekretaris</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji1" class="form-label">Penguji 1</label>
                                <select class="form-select" id="penguji1" name="penguji1" required>
                                    <option selected disabled>Pilih Penguji 1</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="penguji2" class="form-label">Penguji 2</label>
                                <select class="form-select" id="penguji2" name="penguji2" required>
                                    <option selected disabled>Pilih Penguji 2</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_room" class="form-label">Nomor Ruangan</label>
                                <select class="form-select" id="no_room" name="no_room" required>
                                    <option selected disabled>Pilih Ruangan</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id_room }}">{{ $room->no_room }} - {{ $room->sesi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date_session" class="form-label">Tanggal Sidang</label>
                                <input type="date" class="form-control" id="date_session" name="date_session" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thesisData = @json($thesis); // Mengambil data thesis dari Blade template
        const studentSelect = document.getElementById('student_id');
        const taSelect = document.getElementById('ta_id');

        taSelect.addEventListener('change', function () {
            const selectedTaId = this.value;

            // Clear existing options in the Nama Siswa select
            studentSelect.innerHTML = '<option selected disabled>Pilih Siswa</option>';

            // Populate Nama Siswa select based on the selected Judul TA
            thesisData.forEach(function (thesisItem) {
                if (thesisItem.id_ta == selectedTaId) {
                    const option = document.createElement('option');
                    option.value = thesisItem.id_ta;
                    option.text = thesisItem.nama;
                    studentSelect.appendChild(option);
                }
            });

            // Set selected option to the first option after populating
            studentSelect.selectedIndex = 1; // Adjust this index based on your option structure
        });

        // Trigger change event on page load if a default option is preselected
        if (taSelect.value) {
            taSelect.dispatchEvent(new Event('change'));
        }
    });
</script>

@endsection
