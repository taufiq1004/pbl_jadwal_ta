@extends('layouts.backend.template')
@section('content')
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Data Session</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div>
                            <!-- Tambahkan elemen lain sesuai kebutuhan -->
                            <a href="{{ url('/formsession') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <th>ID</th>
                                            <th>NIM </th>
                                            <th>Judul TA</th>
                                            <th>Action</th>
                                            <th>Ketua Sidang</th>
                                            <th>Sekretaris</th>
                                            <th>Anggota</th>
                                            <th>Ruangan-Sesi</th>
                                            <th>Tanggal Sidang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        {{-- <tr class="table-info">
                                            <th>Id Lecturer</th>
                                            <th>Nidn</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                            <th>prodi</th>
                                            {{-- <th>Email</th>
                                            <th>Password</th>
                                            <th>Foto</th>
                                            <th>Status</th> --}}
                                            {{-- <th>Aksi</th> --}}
                                        {{-- </tr> --}}
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data_sessions as $data)
                                        <tr class="table-Light">
                                            <td>{{ $data->id_session }}</td>
                                            <td>{{ $data->student_name }}</td>
                                            <td>{{ $data->judul_ta }}</td>
                                            <td>
                                                <a href="{{ route('penilaian.create', $data->id_session) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Nilai
                                                </a>
                                            </td>
                                            <td>{{ $data->ketua_name }}</td>
                                            <td>{{ $data->sekretaris_name }}</td>
                                            <td>{{ $data->anggota_name }}</td>
                                            <td>{{ $data->no_room }} - sesi {{ $data->sesi }}</td>
                                            <td>{{ $data->date_session }}</td>
                                            <td>
                                                {{-- <a data-bs-toggle="modal" data-bs-target="#detail{{ $data->id_lecturer }}" class="btn btn-secondary"><i class="bi bi-three-dots-vertical"></i></a> --}}
                                                <form action="{{ route('session.edit', ['id' => $data->id_session]) }}" method="GET" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i class="fas fa-edit"></i> Update
                                                    </button>
                                                </form>
                                                <form action="{{ route('session.destroy', ['id' => $data->id_session]) }}" method="POST" style="display: inline;">
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
   

{{-- <!-- Modal untuk import -->--}}
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
                <form action="{{ route('session.import_excel') }}" method="POST" enctype="multipart/form-data">
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
