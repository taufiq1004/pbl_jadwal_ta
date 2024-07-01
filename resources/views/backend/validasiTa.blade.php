@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title fw-semibold mb-4">Data Validasi TA</h5>
            <div class="container-fluid">
                <!-- Data Validasi TA -->
                <div class="card shadow mb-4">
                    <div>
                        <a href="{{ route('backend.form.formValidasiTa') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Data
                        </a>
                               
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <style>
                                .table-bordered th,
                                .table-bordered td {
                                    border: 1px solid #dee2e6 !important;
                                }
                            </style>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-bordered">
                                    <tr class="table-info">
                                        <th>No</th>
                                        <th>TA ID</th>
                                        <th>Komentar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    @foreach ($data_validasi_ta as $index => $data)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $data->thesis_judul }}</td>
                                        <td>{{ $data->komentar }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            <a href="{{ route('backend.form.formEditValidasiTa', $data->id_validasi) }}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <form action="{{ route('backend.form.formEditValidasiTa.destroy', $data->id_validasi) }}" method="POST" style="display:inline-block;">
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

{{-- <!-- Modal untuk import -->--}}

@endsection
