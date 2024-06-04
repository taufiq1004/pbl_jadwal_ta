@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add Detail Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('detailThesis.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_detailta" class="form-label">Id Detail TA</label>
                                <input type="text" class="form-control" id="id_detailta" name="id_detailta" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim_student" class="form-label">Student Name</label>
                                <select class="form-select" id="nim_student" name="nim_student" required>
                                    <option selected disabled>Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->nim }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ta_id" class="form-label">Thesis Title</label>
                                <select class="form-select" id="ta_id" name="ta_id" required>
                                    <option selected disabled>Select Thesis Title</option>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('backend.detailThesis') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
``
