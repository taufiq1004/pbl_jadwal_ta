@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Tugas Akhir</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div>
                        <a href="{{ url('/formThesis') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-bordered">
                                    <tr class="table-info">
                                        <th>Id</th>
                                        <th>Name Student</th>
                                        <th>Judul</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    @foreach ($data_thesis as $data)
                                    <tr>
                                        <td>{{ $data->id_ta }}</td>
                                        <td>{{ $data->name_student }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->tgl_pengajuan }}</td>
                                        <td>{{ $data->file_name }}</td>
                                        <td>
                                            <a href="{{ Storage::url($data->file_name) }}" class="btn btn-success" download>
                                                <i class="fas fa-download"></i> Download
                                            </a>                                                                                   
                                            <form action="{{ route('thesis.edit', ['id' => $data->id_ta]) }}" method="GET" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-secondary">
                                                    <i class="fas fa-edit"></i> Update
                                                </button>
                                            </form>
                                            <form action="{{ route('thesis.destroy', $data->id_ta) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
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
