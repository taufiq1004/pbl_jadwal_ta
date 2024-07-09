<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Membuat atau memperbarui peran
         $roleAdmin = Role::updateOrCreate(['name' => 'admin']);
         $roleDosen = Role::updateOrCreate(['name' => 'dosen']);
         $roleKaprodi = Role::updateOrCreate(['name' => 'kaprodi']);
         $roleMahasiswa = Role::updateOrCreate(['name' => 'mahasiswa']);

         // Assign role ke user yang ada
         $userAdmin = User::find(1); // Sesuaikan dengan ID pengguna Anda
         $userKaprodi = User::find(2); // Sesuaikan dengan ID pengguna Anda
         //dosen
         $userDosen1 = User::find(3);
         $userDosen2 = User::find(4);
         $userDosen3 = User::find(5);
         $userDosen4 = User::find(6);
         $userDosen5 = User::find(7);
         //mahasiswa
         $userMahasiswa1 = User::find(8);
         $userMahasiswa2 = User::find(9);
         $userMahasiswa3 = User::find(10);
         $userMahasiswa4 = User::find(11);
         if ($userAdmin) {
            $userAdmin->assignRole($roleAdmin);
        }

        if ($userKaprodi) {
            $userKaprodi->assignRole($roleKaprodi);
        }

        // Assign role ke user Dosen
        $userDosen1 = User::where('email', 'alde@pnp.ac.id')->first();
        if ($userDosen1) {
            $userDosen1->assignRole($roleDosen);
        }

        $userDosen2 = User::where('email', 'aldo@pnp.ac.id')->first();
        if ($userDosen2) {
            $userDosen2->assignRole($roleDosen);
        }

        $userDosen3 = User::where('email', 'cipto@pnp.ac.id')->first();
        if ($userDosen3) {
            $userDosen3->assignRole($roleDosen);
        }

        $userDosen4 = User::where('email', 'deddy@pnp.ac.id')->first();
        if ($userDosen4) {
            $userDosen4->assignRole($roleDosen);
        }

        $userDosen5 = User::where('email', 'defni@pnp.ac.id')->first();
        if ($userDosen5) {
            $userDosen5->assignRole($roleDosen);
        }

        // Assign role ke user Mahasiswa
        $userMahasiswa1 = User::where('email', 'athira@pnp.ac.id')->first();
        if ($userMahasiswa1) {
            $userMahasiswa1->assignRole($roleMahasiswa);
        }

        $userMahasiswa2 = User::where('email', 'cindy@pnp.ac.id')->first();
        if ($userMahasiswa2) {
            $userMahasiswa2->assignRole($roleMahasiswa);
        }

        $userMahasiswa3 = User::where('email', 'razi@pnp.ac.id')->first();
        if ($userMahasiswa3) {
            $userMahasiswa3->assignRole($roleMahasiswa);
        }

        $userMahasiswa4 = User::where('email', 'winaldo@pnp.ac.id')->first();
        if ($userMahasiswa4) {
            $userMahasiswa4->assignRole($roleMahasiswa);
        }
        // Tambahkan assignment role untuk user Dosen dan Mahasiswa lainnya sesuai kebutuhan
    }
}
