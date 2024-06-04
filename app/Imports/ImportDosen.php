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
                'nidn' => $row[0],
                'name' => $row[1],
                'gender' => $row[2],
                'email' => $row[3],
            ]);
        }
    }
}
