<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_room=[
            ['1','E301'],
            ['2','E302'],
            ['3','E303'],
            ['4','E304'],
            ['5','E305'],
            ['6','E306'],
            ['7','E201'],
            ['8','E202'],
            ['9','E203'],
            ['10','E204'],
            ['11','E205'],
        ];
        foreach($data_room as $data){
            DB::table('rooms')->insert([
                'id_room'=>$data[0],
                'no_room'=>$data[1],
                
            ]);
    }
}
}
