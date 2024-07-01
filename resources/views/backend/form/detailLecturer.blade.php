<!-- resources/views/backend/detailLecturer.blade.php -->

@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Detail Lecturer</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIDN</th>
                                <td>{{ $lecturer->nidn }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $lecturer->name }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $lecturer->gender }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $lecturer->email }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('backend.lecturer') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
