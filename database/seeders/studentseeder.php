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
            ['2211082004','Athira Rahmadini','1','22'],
            ['2211081006','Cindy Steffani','1','22'],
            ['2111082026','Muhammad Ar-razi A gazali','3','21'],
            ['2111082047','Winaldo Ageng Kalimasada','2','21'],
            ['2211081009','Fitri Sakinah','4','22'],
            ['2211081010','Hafifah Azahra','2','22'],
            ['2211081021','Nurhadi Sabani','1','22'],
            ['2211081025','Razi Syahriful Zanah','4','22'],
            ['2211081026','Rifko Ahmad','1','22'],
            ['2211081029','Taufiqurahma','2','21'],
            ['2211082007','Fadila Islami Nisa','3','22'],
            ['2211082015','Iqlima Khairunnisa','2','22'],
            ['2211082016','Jazila Valisya Lutfia','4','22'],
            ['2211082023','Nurul Aulia','2','22'],
            ['2211082024','Puti Hanifa Marsla','3','22'],
            ['2211083010','Deni Ramadhan','1','22'],
            ['2211083012','M.Zidhan Prasetyo','2','22'],
            ['2211083013','M Ismal Pratama','4','22'],
            ['2211083020','Arif Kurniawan','3','22'],
            ['2211083022','Auriel Ibrahim','1','22'],
            ['2211083024','Dzaky Rahmat Nurwahid','2','20'],
            ['2211083025','Farhan Muzzaki','4','22'],
            ['2211083026','Geraldo Afrinandi Persada','3','21'],
            ['2211083045','Salma Husna','1','21'],
        

        ];

        foreach($studentData as $data){
            DB::table('students')->insert([
                'nim'=>$data[0],
                'name'=>$data[1],
                'prodi_id'=>$data[2],
                'force'=>$data[3]
            ]);
        }
    }
}
