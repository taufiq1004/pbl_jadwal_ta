<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessionData = [
            [
                'nim_student' => '2211082004',
                'ta_id' => 'TA2024-001',
                'pembimbing1' => 'ALDE ALANDA, S.Kom, M.T',
                'pembimbing2' => 'DEFNI, S.Si, M.Kom',
                'ketua_sidang' => 'RONAL HADI S.T, M.Kom',
                'sekretaris' => 'MERI AZMI, S.T, M.Cs',
                'penguji1' => 'Fanni Sukma, S.ST., M.T',
                'penguji2' => 'Sumema, S.Ds., M.Ds',
                'no_room' => 'R101',
                'date_session' => '2024-06-01',
            ],
            [
                'nim_student' => '2211081006',
                'ta_id' => 'TA2024-002',
                'pembimbing1' => 'YORI ADI ATMA, S.Pd., M.Kom',
                'pembimbing2' => 'ALDO ERIANDA, M.T, S.ST',
                'ketua_sidang' => 'RONAL HADI S.T, M.Kom',
                'sekretaris' => 'MERI AZMI, S.T, M.Cs',
                'penguji1' => 'Fanni Sukma, S.ST., M.T',
                'penguji2' => 'Sumema, S.Ds., M.Ds',
                'no_room' => 'R102',
                'date_session' => '2024-06-02',
            ],
        ];



        foreach($sessionData as $data){
            DB::table('session')->insert([
                'nim'=>$data[0],
                'ta_id'=>$data[1],
                'pembimbing1'=>$data[2],
                'pembimbing2'=>$data[3],
                'ketua_sidang'=>$data[4],
                'sekretaris'=>$data[5],
                'penguji1'=>$data[6],
                'penguji2'=>$data[7],
                'no_room'=>$data[8],
                'date_session'=>$data[9]
            ]);
    }
}

}
