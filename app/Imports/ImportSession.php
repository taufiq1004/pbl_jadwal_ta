<?php

namespace App\Imports;

use App\Models\Session;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportSession implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Session::create([
                'id_session' => $row[0],
                'ta_id' => $row[1],
                'pembimbing1' => $row[2],
                'pembimbing2' => $row[3],
                'ketua_sidang' => $row[4],
                'sekretaris' => $row[5],
                'penguji1' => $row[6],
                'penguji2' => $row[7],
                'no_room' => $row[8],
                'date_session' => $row[9],
            ]);
        }
    }
}
