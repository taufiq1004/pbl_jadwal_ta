<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUser implements ToCollection
{
    /**
     * Impor data dari Excel.
     *
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Lewati baris header
            if ($row->first() == 'Name') {
                continue;
            }

            // Periksa apakah semua kolom yang diperlukan ada
            if (count($row) < 4) {
                // Tangani baris yang tidak lengkap
                continue;
            }

            // Validasi data sebelum membuat pengguna
            $name = $row[0];
            $role = $row[1];
            $email = $row[2];
            $password = $row[3];

            // Anda dapat menambahkan validasi tambahan di sini jika diperlukan

            // Buat pengguna
            User::create([
                'name' => $name,
                'role' => $role,
                'email' => $email,
                'password' => bcrypt($password), // Enkripsi kata sandi
            ]);
        }
    }
}
