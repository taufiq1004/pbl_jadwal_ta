@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Detail Sidang</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('detailSession.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_detail" class="form-label">ID Detail</label>
                                <input type="text" class="form-control" id="id_detail" name="id_detail" required>
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
                                <label for="final_score" class="form-label">Nilai Akhir</label>
                                <input type="text" class="form-control" id="final_score" name="final_score" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.detailSession') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
