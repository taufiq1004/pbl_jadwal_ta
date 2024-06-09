@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Detail Data Session</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div>
                            <!-- Tambahkan elemen lain sesuai kebutuhan -->
                            <a href="{{ url('/formDetailSession') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <th>ID</th>
                                            <th>Nama </th>
                                            <th>Judul TA</th>
                                            <th>Nilai Akhir</th>
                                            <th>Status</th>
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
                                        @foreach ($DetailSession as $data)
                                        <tr class="table-Light">
                                            <td>{{$data->id_detail}}</td>
                                            <td>{{$data->student_name}}</td>
                                            <td>{{$data->thesis_title}}</td>
                                            <td>{{$data->final_score}}</td>
                                            <td>{{$data->status}}</td>
                                            <td>
                                                {{-- <a data-bs-toggle="modal" data-bs-target="#detail{{ $data->id_lecturer }}" class="btn btn-secondary"><i class="bi bi-three-dots-vertical"></i></a> --}}
                                                <form action="{{ route('detailSession.edit', ['id' => $data->id_detail]) }}" method="GET" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i class="fas fa-edit"></i> Update
                                                    </button>
                                                </form>
                                                <form action="{{ route('detailSession.destroy', ['id' => $data->id_detail]) }}" method="POST" style="display: inline;">
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
