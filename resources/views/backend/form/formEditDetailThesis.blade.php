@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Detail Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('detailThesis.update', $detailThesis->id_detailta) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_detailta" class="form-label">Id Detail TA</label>
                                <input type="text" class="form-control" id="id_detailta" name="id_detailta" value="{{ $detailThesis->id_detailta }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nim_student" class="form-label">Student Name</label>
                                <select class="form-select" id="nim_student" name="nim_student" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nim }}" {{ $student->nim == $detailThesis->nim_student ? 'selected' : '' }}>{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ta_id" class="form-label">Thesis Title</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    @foreach ($thesis as $th)
                                        <option value="{{ $th->id_ta }}" {{ $th->id_ta == $detailThesis->id_ta ? 'selected' : '' }}>{{ $th->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing1" class="form-label">Pembimbing 1</label>
                                <select class="form-select" id="pembimbing1" name="pembimbing1" required>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $detailThesis->pembimbing1 ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pembimbing2" class="form-label">Pembimbing 2</label>
                                <select class="form-select" id="pembimbing2" name="pembimbing2" required>
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->nidn }}" {{ $lecturer->nidn == $detailThesis->pembimbing2 ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
