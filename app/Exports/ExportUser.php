<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data_user = DB::table('users')
            ->orderBy('id')
            ->get();
        return $data_user;
    }
}
