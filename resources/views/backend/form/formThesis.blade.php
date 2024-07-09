@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul TA</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File TA</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label for="dokumen_pkl" class="form-label">Upload Dokumen PKL</label>
                                <input type="file" class="form-control" id="dokumen_pkl" name="dokumen_pkl" required>
                            </div>
                            <div class="mb-3">
                                <label for="proposal" class="form-label">Proposal</label>
                                <input type="file" class="form-control" id="proposal" name="proposal" required>
                            </div>
                            <div class="mb-3">
                                <label for="lembar_bimbingan" class="form-label">Lembar Bimbingan</label>
                                <input type="file" class="form-control" id="lembar_bimbingan" name="lembar_bimbingan" required>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                                <select class="form-select" id="pembimbing1" name="pembimbing1" required>
                                    <option selected disabled>Select Pembimbing 1</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer }}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing2" class="form-label">Pembimbing 2</label>
                                <select class="form-select" id="pembimbing2" name="pembimbing2" required>
                                    <option selected disabled>Select Pembimbing 2</option>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id_lecturer}}">{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.thesis') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const formThesis = document.getElementById('formThesis');

        formThesis.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            fetch('{{ route('thesis.store') }}', {
                method: 'POST',
                body: new FormData(formThesis),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle success case
                console.log('Success:', data);
                alert('Thesis data added successfully.');

                // Clear form inputs
                formThesis.reset();

                // Reload the table in validasiTa page
                fetch('{{ route('validasiTa') }}')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('dataTable').innerHTML = html;
                    })
                    .catch(error => {
                        console.error('Error fetching table data:', error);
                    });
            })
            .catch((error) => {
                // Handle error case
                console.error('Error:', error);
                alert('An error occurred while adding thesis data.');
            });
        });
    });
</script> --}}


@endsection
