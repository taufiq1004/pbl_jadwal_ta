@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Data Room</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div>
                            <a href="{{ url('/formRoom') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <th>ID</th>
                                            <th>No Room</th>
                                            <th>Sesi</th>
                                            <th>Availability</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                        @foreach ($data_room as $data)
                                        <tr class="table-Light">
                                            <td>{{ $data->id_room }}</td>
                                            <td>{{ $data->no_room }}</td>
                                            <td>{{ $data->sesi }}</td>
                                            <td style="padding: 8px; color: {{ $data->is_available == 'Tersedia' ? '#ffffff' : '#000000' }}; text-align: center;">
                                                <span style="padding: 4px 12px; border-radius: 6px; background-color: {{ $data->is_available == 'Tersedia' ? '#cce5ff' : '#f8d7da' }}; color: {{ $data->is_available == 'Tersedia' ? '#007bff' : '#dc3545' }}; display: inline-block; font-size: 0.9em;">
                                                    {{ $data->is_available }}
                                                </span>
                                            </td>
                                            
                                            {{-- <td style="padding: 8px; color: {{ $data->is_available == 'Tersedia' ? '#ffffff' : '#000000' }}; text-align: center;">
                                                <span style="padding: 4px 8px; border-radius: 4px; background-color: {{ $data->is_available == 'Tersedia' ? '#007bff' : '#dc3545' }}; color: {{ $data->is_available == 'Tersedia' ? '#ffffff' : '#000000' }}; display: inline-block; font-size: 0.9em;">
                                                    {{ $data->is_available }}
                                                </span>
                                            </td>  
                                                                                       --}}
                                                                                       
                                            <td>
                                                <a href="{{ route('room.edit', $data->id_room) }}" class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-edit"></i> Update
                                                </a>
                                                <form action="{{ route('room.destroy', $data->id_room) }}" method="POST" style="display:inline-block;">
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
