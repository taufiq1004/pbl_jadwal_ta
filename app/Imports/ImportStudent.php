<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportStudent implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row) {
            Student::create([
                'id_student' => $row[0],
                'nim' => $row[1],
                'name' => $row[2],
                'prodi_id' => $row[3],
                'force' => $row[4],
            ]);
        }
    }
}
