<?php

namespace App\Exports;

use App\Models\Lecturer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDosen implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $data_lecturer = DB::table('lecturers')
            ->orderBy('nidn') // Order by id_prodi from smallest to largest
            ->get();
            return $data_lecturer;
    }
}
