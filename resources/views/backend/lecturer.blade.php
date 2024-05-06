@extends('dashboard-content')
@section('lecturer')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Data Dosen</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-info">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>                                        
                                        @foreach ($data_lecturer as $data)
                                        <tr class="table-Light">
                                            <th>{{$data->id_lecturer}}</th>
                                            <th>{{$data->nidn}}</th>
                                            <th>{{$data->name}}</th>
                                            <th>{{$data->email}}</th>
                                            <th>{{$data->position}}</th>
                                            <th>{{$data->prodi}}</th>
                                            {{-- <th>{{$data->email}}</th>
                                            <th>{{$data->password}}</th>
                                            <th>{{$data->image}}</th>
                                            <th>{{$data->status}}</th> --}}
                                            <th>
                                                <a data-bs-toggle="modal" data-bs-target="#detail{{ $data->id_lecturer }}" class="btn btn-secondary"><i class="bi bi-three-dots-vertical"></i></a>
                                            </th>
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