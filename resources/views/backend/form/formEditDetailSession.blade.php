@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Data Detail Sidang</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('detailSession.update', $DetailSession->id_detail) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_detail" class="form-label">Id Session</label>
                                <input type="text" class="form-control" id="id_detail" name="id_detail" value="{{ $DetailSession->id_detail }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nim_student" class="form-label">Name Student</label>
                                <select class="form-select" id="nim_student" name="nim_student" required>
                                    <option selected disabled>Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nim }}" {{ $student->nim == $DetailSession->nim_student ? 'selected' : '' }}>{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ta_id" class="form-label">Judul TA</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option selected disabled>Select Judul</option>
                                    @foreach ($thesis as $thesisItem)
                                        <option value="{{ $thesisItem->id_ta }}" {{ $thesisItem->id_ta == $DetailSession->ta_id ? 'selected' : '' }}>{{ $thesisItem->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="final_score" class="form-label">Nilai Akhir</label>
                                <input type="text" class="form-control" id="final_score" name="final_score" value="{{ $DetailSession->final_score }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $DetailSession->status }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('backend.detailSession') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
