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
                'nim' => $row[0],
                'name' => $row[1],
                'prodi_id' => $row[2],
                'force' => $row[3],
            ]);
        }
    }
}
