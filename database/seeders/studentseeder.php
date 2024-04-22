<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $studentData=[
            ['2211082004','Athira Rahmadini','TRPL','22'],
            ['2211081006','Cindy Steffani','TRPL','22']
        ];

        foreach($studentData as $data){
            DB::table('students')->insert([
                'nim'=>$data[0],
                'name'=>$data[1],
                'prodi'=>$data[2],
                'force'=>$data[3]
            ]);
        }
    }
}
