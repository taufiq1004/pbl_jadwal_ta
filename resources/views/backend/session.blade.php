@extends('layouts.backend.template')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h1 class="h2">Daftar Sidang</h1>
        </div>

        <a href="{{ route('session.create') }}" class="btn btn-primary mb-3">Tambah Sidang</a>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="table-info">
                        <th>Judul Tugas Akhir</th>
                        <th>Nama Mahasiswa</th>
                        <th>Ketua Sidang</th>
                        <th>Sekretaris</th>
                        <th>Penguji 1</th>
                        <th>Penguji 2</th>
                        <th>Ruangan</th>
                        <th>Tanggal Sidang</th>
                        <th>Status Sidang</th>
                        <th>Total Nilai</th>
                        <th>Total Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_sessions as $sidang)
                        <tr>
                            <td>{{ $sidang->thesis->judul ?? '-' }}</td>
                            <td>{{ $sidang->thesis->nim }} - {{ $sidang->thesis->nama}} </td>
                            <td>
                                @php
                                    $penilaianKetuaSidang = $sidang->penilaians()->where('jabatan', 'KetuaSidang')->first();
                                    $totalNilaiKetua = $penilaianKetuaSidang ? $penilaianKetuaSidang->total_nilai : 0;
                                @endphp
                               {{ $sidang->ketua_name }} - ({{ $totalNilaiKetua ?? 'N/A' }})
                            </td>
                            <td>
                                @php
                                    $penilaianSekretaris = $sidang->penilaians()->where('jabatan', 'SekretarisSidang')->first();
                                    $totalNilaiSekretaris = $penilaianSekretaris ? $penilaianSekretaris->total_nilai : 0;
                                @endphp
                                {{ $sidang->sekretaris_name }} - ({{ $totalNilaiSekretaris ?? 'N/A' }})
                            </td>
                            <td>
                                @php
                                    $penilaianPenguji1 = $sidang->penilaians()->where('jabatan', 'Penguji1')->first();
                                    $totalNilaiPenguji1 = $penilaianPenguji1 ? $penilaianPenguji1->total_nilai : 0;
                                @endphp
                                 {{ $sidang->penguji1_name }} - ({{ $totalNilaiPenguji1 ?? 'N/A' }})
                            </td>
                            <td>
                                @php
                                    $penilaianPenguji2 = $sidang->penilaians()->where('jabatan', 'Penguji2')->first();
                                    $totalNilaiPenguji2 = $penilaianPenguji2 ? $penilaianPenguji2->total_nilai : 0;
                                @endphp
                                 {{ $sidang->penguji2_name }} - ({{ $totalNilaiPenguji2 ?? 'N/A' }})
                            </td>
                           
                            <td>{{ $sidang->no_room ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($sidang->date_session)->format('d-m-Y') }}</td>
                            <td>
                                @php
                                    $jumlahPenilaian = 0;
                                    $totalNilai = 0;

                                    if ($totalNilaiKetua > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiKetua;
                                    }
                                    if ($totalNilaiSekretaris > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiSekretaris;
                                    }

                                    if ($totalNilaiPenguji1 > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiPenguji1;
                                    }

                                    if ($totalNilaiPenguji2 > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiPenguji2;
                                    }

                                    

                                    $rataRata = $jumlahPenilaian > 0 ? number_format($totalNilai / $jumlahPenilaian, 2) : '-';
                                    $statusSidang = $rataRata !== '-' ? ($rataRata > 70 ? 'Lulus' : 'Tidak Lulus') : '-';
                                @endphp
                                {{ $statusSidang }}
                            </td>
                            <td>
                                @php
                                    $rataRata = $jumlahPenilaian > 0 ? number_format($totalNilai / $jumlahPenilaian, 2) : 'N/A';
                                @endphp
                                {{ $rataRata }}
                            </td>
                            <td id="rata-rata-{{ $sidang->id }}">
                                @php
                                    $totalNilaiKetua = $penilaianKetuaSidang ? $penilaianKetuaSidang->total_nilai : 0;
                                    $totalNilaiSekretaris = $penilaianSekretaris ? $penilaianSekretaris->total_nilai : 0;
                                    $totalNilaiPenguji1 = $penilaianPenguji1 ? $penilaianPenguji1->total_nilai : 0;
                                    $totalNilaiPenguji2 = $penilaianPenguji2 ? $penilaianPenguji2->total_nilai : 0;

                                    $jumlahPenilaian = 0;
                                    $totalNilai = 0;

                                    if ($totalNilaiKetua > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiKetua;
                                    }
                                    if ($totalNilaiSekretaris > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiSekretaris;
                                    }

                                    if ($totalNilaiPenguji1 > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiPenguji1;
                                    }
                                    if ($totalNilaiPenguji2 > 0) {
                                        $jumlahPenilaian++;
                                        $totalNilai += $totalNilaiPenguji2;
                                    }

                                   

                                    $rataRata = $jumlahPenilaian > 0 ? number_format($totalNilai / $jumlahPenilaian, 2) : 'N/A';
                                @endphp
                                {{ $rataRata }}
                            </td>
                            <td>
                                <a href="{{ route('session.edit', $sidang->id_session) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-edit"></i> Update
                                </a>
                                <form action="{{ route('session.destroy', $sidang->id_session) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">Tidak ada data sidang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        // Fungsi untuk menghitung rata-rata total nilai
        function hitungRataRata(totalNilaiKetua, totalNilaiPenguji1, totalNilaiPenguji2, totalNilaiSekretaris) {
            let jumlahPenilaian = 0;
            let totalNilai = 0;

            if (totalNilaiKetua > 0) {
                jumlahPenilaian++;
                totalNilai += totalNilaiKetua;
            }
            if (totalNilaiSekretaris > 0) {
                jumlahPenilaian++;
                totalNilai += totalNilaiSekretaris;
            }

            if (totalNilaiPenguji1 > 0) {
                jumlahPenilaian++;
                totalNilai += totalNilaiPenguji1;
            }

            if (totalNilaiPenguji2 > 0) {
                jumlahPenilaian++;
                totalNilai += totalNilaiPenguji2;
            }

            

            let rataRata = jumlahPenilaian > 0 ? (totalNilai / jumlahPenilaian).toFixed(2) : 'N/A';
            return rataRata;
        }

        // Memanggil fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            @foreach($data_sessions as $sidang)
            let totalNilaiKetua_{{ $sidang->id_session }} = parseFloat("{{ $sidang->penilaians()->where('jabatan', 'KetuaSidang')->first()->total_nilai ?? 0 }}");
            let totalNilaiSekretaris_{{ $sidang->id_session }} = parseFloat("{{ $sidang->penilaians()->where('jabatan', 'SekretarisSidang')->first()->total_nilai ?? 0 }}");
            let totalNilaiPenguji1_{{ $sidang->id_session }} = parseFloat("{{ $sidang->penilaians()->where('jabatan', 'Penguji1')->first()->total_nilai ?? 0 }}");
            let totalNilaiPenguji2_{{ $sidang->id_session }} = parseFloat("{{ $sidang->penilaians()->where('jabatan', 'Penguji2')->first()->total_nilai ?? 0 }}");

                let rataRata = hitungRataRata(totalNilaiKetua_{{ $sidang->id_session }}, totalNilaiSekretaris_{{ $sidang->id_session }}, totalNilaiPenguji1_{{ $sidang->id_session }}, totalNilaiPenguji2_{{ $sidang->id_session }});
                console.log('Rata-rata total nilai untuk sidang {{ $sidang->id_session }}: ' + rataRata);
            @endforeach
        });
    </script>
    @endpush
@endsection
