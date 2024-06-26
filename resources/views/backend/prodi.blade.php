@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Data Prodi</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div>
                            <!-- Tambahkan elemen lain sesuai kebutuhan -->
                            <a href="{{ url('/formProdi') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <th>ID</th>
                                            <th>Name Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                
                                    </tfoot>
                                    <tbody>                                        
                                        @foreach ($data_prodi as $data)
                                        <tr class="table-Light">
                                            <td>{{$data->id_prodi}}</td>
                                            <td>{{$data->name_prodi}}</td>
                                            <td>
                                                {{-- <a data-bs-toggle="modal" data-bs-target="#detail{{ $data->id_lecturer }}" class="btn btn-secondary"><i class="bi bi-three-dots-vertical"></i></a> --}}
                                                <a href="{{ route('prodi.edit', $data->id_prodi) }}" class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-edit"></i> Update
                                                </a>
                                                <form action="{{ route('prodi.destroy', $data->id_prodi) }}" method="POST" style="display:inline-block;">
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