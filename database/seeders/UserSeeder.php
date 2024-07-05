<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kaprodi',
                'email' => 'kaprodi@example.com',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dosen',
                'email' => 'dosen@example.com',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@example.com',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
