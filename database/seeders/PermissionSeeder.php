<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

         $userAdmin = User::find(1); // Sesuaikan dengan ID pengguna Anda
         $userKaprodi = User::find(2); // Sesuaikan dengan ID pengguna Anda
         $userDosen = User::find(3); // Sesuaikan dengan ID pengguna Anda
         $userMahasiswa = User::find(4); // Sesuaikan dengan ID pengguna Anda

         if ($userAdmin) {
            $userAdmin->assignRole($roleAdmin);
        }

        if ($userKaprodi) {
            $userKaprodi->assignRole($roleKaprodi);
        }

        if ($userDosen) {
            $userDosen->assignRole($roleDosen);
        }

        if ($userMahasiswa) {
            $userMahasiswa->assignRole($roleMahasiswa);
        }
    }
}
