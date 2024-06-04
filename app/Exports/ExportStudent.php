<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStudent implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $data_student = DB::table('students')
        ->orderBy('nim') // Order by id_prodi from smallest to largest
        ->get();
        return $data_student;
    }
}
