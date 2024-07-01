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
                                        <th>Pembimbing1</th>
                                        <th>Pembimbing2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    @foreach ($data_thesis as $data)
                                    <tr>
                                        <td>{{ $data->id_ta }}</td>
                                        <td>{{ $data->student_name }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->tgl_pengajuan }}</td>
                                        <td>{{ $data->file_name }}</td>
                                        <td>{{ $data->pembimbing1_name }}</td>
                                        <td>{{ $data->pembimbing2_name }}</td>
                                        <td>

                                            <a href="{{ Storage::url($data->file) }}" class="btn btn-success" style="display:inline-block;" download>
                                                <i class="fas fa-download"></i> Download
                                            </a>            
                                            <a href="{{ route('thesis.show', ['id' => $data->id_ta]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>                               
                                            <a href="{{ route('thesis.edit', ['id' => $data->id_ta]) }}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <form action="{{ route('thesis.destroy', $data->id_ta) }}" method="POST" style="display:inline-block;">
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
