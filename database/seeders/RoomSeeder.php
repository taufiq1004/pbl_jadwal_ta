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
            ['1','E301','08:00-10:00'],
            ['2','E301','10:00-12:00'],
            ['3','E301','13:00-15:00'],
            ['4','E301','15:00-17:00'],
            ['5','E302','08:00-10:00'],
            ['6','E302','10:00-12:00'],
            ['7','E302','13:00-15:00'],
            ['8','E302','15:00-17:00'],
            ['9','E303','08:00-10:00'],
            ['10','E303','10:00-12:00'],
            ['11','E303','13:00-15:00'],
            ['12','E303','15:00-17:00'],
            ['13','E304','08:00-10:00'],
            ['14','E304','10:00-12:00'],
            ['15','E304','13:00-15:00'],
            ['16','E304','15:00-17:00'],
            ['17','E305','08:00-10:00'],
            ['18','E305','10:00-12:00'],
            ['19','E305','13:00-15:00'],
            ['20','E305','15:00-17:00'],
        ];
        foreach($data_room as $data){
            DB::table('rooms')->insert([
                'id_room'=>$data[0],
                'no_room'=>$data[1],
                'sesi'=>$data[2],
                
            ]);
    }
}
}
