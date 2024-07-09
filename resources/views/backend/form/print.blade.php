<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Sidang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Berita Acara Sidang Tugas Akhir</h1>

    <table>
        <tr>
            <th>Judul Tugas Akhir</th>
            <td>{{ $judul_ta }}</td>
        </tr>
        <tr>
            <th>Nama Mahasiswa</th>
            <td>{{ $nama_mahasiswa }}</td>
        </tr>
        <tr>
            <th>Tanggal Sidang</th>
            <td>{{ $tanggal_sidang }}</td>
        </tr>
        <tr>
            <th>Ruangan</th>
            <td>{{ $ruangan }}</td>
        </tr>
    </table>

    <h2>Tim Penguji</h2>
    <table>
        <tr>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>Ketua Sidang</td>
            <td>{{ $ketua_sidang }}</td>
            <td>{{ $total_nilai_ketua }}</td>
        </tr>
        <tr>
            <td>Sekretaris</td>
            <td>{{ $sekretaris_sidang }}</td>
            <td>{{ $total_nilai_sekretaris }}</td>
        </tr>
        <tr>
            <td>Penguji 1</td>
            <td>{{ $penguji_1 }}</td>
            <td>{{ $total_nilai_penguji1 }}</td>
        </tr>
        <tr>
            <td>Penguji 2</td>
            <td>{{ $penguji_2 }}</td>
            <td>{{ $total_nilai_penguji2 }}</td>
        </tr>
    </table>

    <h2>Hasil Sidang</h2>
    <table>
        <tr>
            <th>Total Nilai</th>
            <td>{{ ($total_nilai_ketua + $total_nilai_sekretaris + $total_nilai_penguji1 + $total_nilai_penguji2) / 4 }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @php
                    $rata_rata = ($total_nilai_ketua + $total_nilai_sekretaris + $total_nilai_penguji1 + $total_nilai_penguji2) / 4;
                    $status = $rata_rata > 70 ? 'Lulus' : 'Tidak Lulus';
                @endphp
                {{ $status }}
            </td>
        </tr>
    </table>

    <div style="margin-top: 50px;">
        <p>Tanggal: {{ date('d-m-Y') }}</p>
        <p>Tanda tangan Ketua Sidang:</p>
        <br>
        <p>(________)</p>
    </div>
</body>
</html>
