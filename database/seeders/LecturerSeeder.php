<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_lecturer=[
            ['1614242526262','Athira Rahmadini','tira@gmail.com','lecturer','TRPL'],
            ['2624562415514','Cindy Steffani','cindy@gmail.com','Lecturer','TRPL']
        ];

        foreach($data_lecturer as $data){
            DB::table('lecturers')->insert([
                'nidn'=>$data[0],
                'name'=>$data[1],
                'email'=>$data[2],
                'prodi'=>$data[3],
                'force'=>$data[4],
            ]);
        }
    }
}
