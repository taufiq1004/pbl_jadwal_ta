<?php
namespace App\Imports;

use App\Models\Lecturer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;
class ImportDosen implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Skip rows with null or empty nidn
            if (is_null($row[0]) || trim($row[0]) === '') {
                Log::warning('Skipping row with empty nidn: ', $row->toArray());
                continue;
            }

            // Skip rows with null or empty name, gender, or email
            if (is_null($row[1]) || trim($row[1]) === '' ||
                is_null($row[2]) || trim($row[2]) === '' ||
                is_null($row[3]) || trim($row[3]) === '') {
                Log::warning('Skipping row with empty fields: ', $row->toArray());
                continue;
            }

            // Debug: Log the data being imported
            Log::info('Importing lecturer: ', [
                'id_lecturer' => $row[0],
                'nidn' => $row[1],
                'name' => $row[2],
                'gender' => $row[3],
                'email' => $row[4],
            ]);

            Lecturer::create([
                'id_lecturer' => $row[0],
                'nidn' => $row[1],
                'name' => $row[2],
                'gender' => $row[3],
                'email' => $row[4],   
                     ]);
        }
    }
}
