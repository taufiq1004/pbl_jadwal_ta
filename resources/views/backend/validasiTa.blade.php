@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Validasi Tugas Akhir</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-info">
                            <th>No</th>
                            <th>Mahasiswa</th>
                            <th>Judul TA</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_validasi_ta as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->validasi->status }}</td>
                            <td>
                                <form action="{{ route('backend.form.formEditValidasiTa.update', $data->validasi->id_validasi) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group date">
                                        <input type="hidden" class="form-control" id="tanggal_validasi" name="tanggal_validasi" value="{{ \Carbon\Carbon::now() }}"/>
                                    </div>
                                    <button type="submit" class="btn btn-{{ $data->validasi->status == 'Valid' ? 'success' : 'danger' }}">
                                        {{ $data->validasi->status == 'Valid' ? 'Valid' : 'Tidak Valid' }}
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
@endsection
