<?php
namespace App\Exports;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
{
    return collect(DB::table('users')->orderBy('id')->get());
}

}
