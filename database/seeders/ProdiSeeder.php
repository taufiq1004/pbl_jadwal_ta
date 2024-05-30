<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_prodi=[
            ['1','Teknologi Rekayasa Perangkat Lunak'],
            ['2','Manajemen Informatika'],
            ['3','Teknik Komputer'],
            ['4','Animasi'],
        ];

        foreach($data_prodi as $data){
            DB::table('prodis')->insert([
                'id_prodi'=>$data[0],
                'name_prodi'=>$data[1],
            ]);
        }
    }
}
