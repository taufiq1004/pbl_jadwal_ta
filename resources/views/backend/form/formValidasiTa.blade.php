@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Validasi TA</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('backend.form.formValidasiTa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="ta_id" class="form-label">TA ID</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option selected disabled>Select Thesis</option>
                                    @foreach ($theses as $thesis)
                                    <option value="{{ $thesis->id_ta }}">{{ $thesis->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="komentar" class="form-label">Komentar</label>
                                <input type="text" class="form-control" id="komentar" name="komentar" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.validasiTa') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
