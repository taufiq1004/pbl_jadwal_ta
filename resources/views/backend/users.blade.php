@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title fw-semibold mb-4">Data Users</h5>
            <div class="container-fluid">
                <!-- Data Users -->
                <div class="card shadow mb-4">
                    <div>
                        <a href="{{ url('/formUser') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Data
                        </a>
                        <a href="{{ route('users.export_excel') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> Export
                        </a>                                              
                        <!-- Button untuk membuka modal import -->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importModal">
                            <i class="fas fa-cloud-upload-alt"></i> Import
                        </button>                        
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
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                    @foreach ($data_user as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->role }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->password }}</td>
                                       
                                        <td>
                                            <a href="{{ route('users.show', ['id' => $data->id]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('users.edit', ['id' => $data->id]) }}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <form action="{{ route('users.destroy', $data->id) }}" method="POST" style="display:inline-block;">
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

<!-- Modal untuk import -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.import_excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Choose Excel File</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
