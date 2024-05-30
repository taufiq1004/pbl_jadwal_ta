<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

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
            ['0025088802', 'ALDE ALANDA, S.Kom, M.T','Laki-Laki','alde@pnp.ac.id'],
            ['003078904','ALDO ERIANDA, M.T, S.ST', 'Laki-laki', 'aldo@pnp.ac.id'],
            ['0002037410','CIPTO PRABOWO, S.T, M.T', 'Laki-laki', 'cipto@pnp.ac.id'],
            ['0015048105', 'DEDDY PRAYAMA, S.Kom, M.ISD', 'Laki-laki', 'deddy@pnp.ac.id'],
            ['0007128104','DEFNI, S.Si, M.Kom', 'Perempuan','defni@pnp.ac.id'],
            ['0028097803','DENI SATRIA, S.Kom, M.Kom','Laki-laki', 'dns1st@gmail.com'],
            ['0009058601','DWINY MEIDELFI, S.Kom, M.Cs',  'Perempuan',  'dwinymeidelfi@pnp.ac.id'],
            ['0001097802','ERVAN ASRI, S.Kom, M.Kom', 'Laki-laki', 'ervan@pnp.ac.id'],
            ['0021078601','FAZROL ROZI, M.Sc.', 'Laki-laki','fazrol@pnp.ac.id'],
            ['1029058502','FITRI NOVA, M.T, S.ST', 'Perempuan','fitrinova85@gmail.com'],
        //     [11,'Ir. HANRIYAWAN ADNAN MOODUTO, M.Kom.', '0010056606', '196605101994031003', 'Laki-laki', 7, 19, 'mooduto@pnp.ac.id', '12345678', '', '1'],
        //     [12,'HENDRICK, S.T, M.T.,Ph.D', '0002127705', '197712022006041000', 'Laki-laki', 4, 7, 'hendrickpnp77@gmail.com', '12345678', '', '1'],
        //     [13,'HIDRA AMNUR, S.E., S.Kom, M.Kom', '0015048209', '198204152012121002', 'Laki-laki', 7, 18, 'hidra@pnp.ac.id', '12345678', '', '1'],
        //     [14,'HUMAIRA, S.T, M.T', '0019038103', '198103192006042002', 'Perempuan', 7, 20, 'humaira@pnp.ac.id', '12345678', '', '1'],
        //     [15,'IKHSAN YUSDA PRIMA PUTRA, S.H., LL.M', '0001107505', '197510012006041002', 'Laki-laki', 7, 19, '', '12345678', '', '1'],
        //     [16,'INDRI RAHMAYUNI, S.T, M.T', '0025068301', '198306252008012004', 'Perempuan', 7, 20, 'indri@pnp.ac.id', '12345678', '', '1'],
        //     [17,'MERI AZMI, S.T, M.Cs', '0029068102', '198106292006042001', 'Perempuan', 7, 18, 'meriazmi@gmail.com', '12345678', '', '1'],
        //     [18,'Ir. Rahmat Hidayat, S.T, M.Sc.IT', '1015047801', '197804152000121002', 'Laki-laki', 7, 20, 'rahmat@pnp.ac.id', '12345678', '', '1'],
        //     [19,'RASYIDAH, S.Si, M.M.', '0001067407', '197406012006042001', 'Perempuan', 7, 18, 'rasyidah@pnp.ac.id', '12345678', '', '1'],
        //     [20,'RIKA IDMAYANTI, S.T, M.Kom', '0022017806', '197801222009122002', 'Perempuan', 7, 20, 'rikaidmayanti@pnp.ac.id', '12345678', '', '1'],
        //     [21,'RITA AFYENNIS.Kom, M.Kom', '0018077099', '197007182008012010', 'Perempuan', 7, 18, 'ritaafyenni@pnp.ac.id', '12345678', '', '1'],
        //     [22,'RONAL HADI S.T, M.Kom', '0029017603', '197601292002121001', 'Laki-laki', 7, 19, 'ronalhadi@pnp.ac.id', '12345678', '', '1'],
        //     [23,'TAUFIK GUSMAN, S.S.T, M.Ds', '0010088805', ' 19880810 201903 1 012', 'Laki-laki', 7, 18, 'taufikgusman@gmail.com', '12345678', '', '1'],
        //     [24,'YANCE SONATHA, S.Kom, M.T', '0029128003', '198012292006042001', 'Perempuan', 7, 18, 'sonatha.yance@gmail.com', '12345678', '', '1'],
        //     [25,'Dr. Ir. YUHEFIZAR, S.Kom., M.Kom', '0013017604', '197601132006041002', 'Laki-laki', 7, 18, 'yuhefizar@pnp.ac.id', '12345678', '', '1'],
        //     [26,'YULHERNIWATI, S.Kom, M.T', '0019077609', '197607192008012017', 'Perempuan', 7, 20, 'yulherniwati@pnp.ac.id', '12345678', '', '1'],
        //     [27,'TRI LESTARI, S.Pd.,M.Eng.', '0005039205', '199203052019032025', 'Perempuan', 7, 18, 'trilestari0503@gmail.com', '12345678', '', '1'],
        //     [28,'Fanni Sukma, S.ST., M.T', '0006069009', '199006062019032026', 'Perempuan', 7, 20, 'fannisukma@pnp.ac.id', '12345678', '', '1'],
        //     [29,'Andre Febrian Kasmar, S.T., M.T.', '0020028804', '198802202019031009', 'Laki-laki', 7, 20, 'andrefebrian@pnp.ac.id', '12345678', '', '1'],
        //     [30,'RONI PUTRA, S.Kom, M.T ', '0022078607', '198607222009121004', 'Laki-laki', 7, 18, 'rn.putra@gmail.com', '12345678', '', '1'],
        //     [31,'Ardi Syawaldipa, S.Kom.,M.T.', '0029058909', '19890529 202012 1 003', 'Laki-laki', 7, 19, 'ardi.syawaldipa@gmail.com', '12345678', '', '1'],
        //     [32,'Harfebi Fryonanda, S.Kom., M.Kom', '0310119101', '19911110 202203 1 008', 'Laki-laki', 7, 20, 'harfebi@pnp.ac.id', '12345678', '', '1'],
        //     [33,'deva Gaputra, S.Kom., M.Kom', '0012098808', '198809122022031006', 'Laki-laki', 7, 19, 'idevagaputra@pnp.ac.id', '12345678', '', '1'],
        //     [34,'Yulia Jihan Sy, S.Kom., M.Kom', '1017078904', '19890717 202203 2 010', 'Perempuan', 7, 19, 'yulia@pnp.ac.id', '12345678', '', '1'],
        //     [35,'Andrew Kurniawan Vadreas, S.Kom., M.T ', '1021028702', '19870221 202203 1 001', 'Laki-laki', 7, 18, 'andrew@pnp.ac.id', '12345678', '', '1'],
        //     [36,'YORI ADI ATMA, S.Pd., M.Kom', '2010059001', '19900510 202203 1 002', 'Laki-laki', 7, 18, 'yori@pnp.ac.id', '12345678', '', '1'],
        //     [37,'Dr. Ulya Ilhami Arsyah, S.Kom., M.Kom', '0130039101', '19910330 202203 1 004', 'Laki-laki', 7, 20, 'ulya@pnp.ac.id', '12345678', '', '1'],
        //     [38,'Hendra Rotama, S.Pd., M.Sn', '0218068801', '19880618 202203 1 003', 'Laki-laki', 7, 19, 'hendrarotama@pnp.ac.id', '12345678', '', '1'],
        //     [39,'Sumema, S.Ds., M.Ds', '0008069103', '19910608 202203 2 006', 'Perempuan', 7, 19, 'sumema@pnp.ac.id', '12345678', '', '1'],
        //     [40,'Raemon Syaljumairi, S.Kom., M.Kom', '0017078407', '19840717 201012 1 002', 'Laki-laki', 7, 19, 'raemon_syaljumairi@pnp.ac.id', '12345678', '', '1'],
        //     [41,'Mutia Rahmi Dewi, S.Kom., M.Kom', '0004099601', '19960904 202203 2 018', 'Perempuan', 7, 20, 'mutiarahmi@pnp.ac.id', '12345678', '', '1'],
        //     [42,'Novi, S.Kom., M.T', '0001118611', '19861101 202203 2 003', 'Perempuan', 7, 19, 'novi@pnp.ac.id', '12345678', '', '1'],
        //     [43,'Rahmi Putri Kurnia, S.Kom., M.Kom', '0027089303', '19930827 202203 2 012', 'Perempuan', 7, 19, 'rahmiputri@pnp.ac.id', '12345678', '', '1']
        ];
        foreach($data_lecturer as $data){
            DB::table('lecturers')->insert([
                'nidn'=>$data[0],
                'name'=>$data[1],
                'gender'=>$data[2],
                'email'=>$data[3],
            ]);
        }
    }
}
