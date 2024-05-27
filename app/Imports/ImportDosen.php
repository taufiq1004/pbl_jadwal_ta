<?php
namespace App\Imports;

use App\Models\Lecturer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDosen implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Lecturer::create([
                'id_lecturer' => $row[0],
                'nidn' => $row[1],
                'name' => $row[2],
                'email' => $row[3],
                'position' => $row[4],
            ]);
        }
    }
}
