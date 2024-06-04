@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Thesis</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div>
                        <a href="{{ url('/formDetailThesis') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Detail
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-bordered">
                                    <tr class="table-info">
                                        <th>ID</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Judul TA</th>
                                        <th>Pembimbing 1</th>
                                        <th>Pembimbing 2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    @foreach ($data_detail_thesis as $detail)
                                    <tr>
                                        <td>{{ $detail->id_detailta }}</td>
                                        <td>{{ $detail->student_name }}</td>
                                        <td>{{ $detail->thesis_title }}</td>
                                        <td>{{ $detail->pembimbing1_name }}</td>
                                        <td>{{ $detail->pembimbing2_name }}</td>
                                        <td>
                                            <a href="{{ route('detailThesis.edit', $detail->id_detailta) }}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <form action="{{ route('detailThesis.destroy', $detail->id_detailta) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
