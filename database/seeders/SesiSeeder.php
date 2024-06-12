<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_sesi=[
            ['08:00-10:00'],
            ['10:00-12:00'],
            ['13:00-15:00'],
            ['15:00-17:00'],
        ];
        foreach($data_sesi as $data){
            DB::table('sesi')->insert([
                'sesi'=>$data[0],
                
            ]);
    }
    }
}
