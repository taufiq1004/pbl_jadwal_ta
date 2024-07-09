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
        // Menambahkan user sebagai Dosen
        DB::table('users')->insert([
            [
                'name' => 'Taufiq',
                'email' => 'admin@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Naia',
                'email' => 'kaprodi@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Alde Alanda, S.Kom, M.T',
                'email' => 'alde@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Aldo Erianda, M.T, S.ST',
                'email' => 'aldo@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cipto Prabowo, S.T, M.T',
                'email' => 'cipto@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Deddy Prayama, S.Kom, M.ISD',
                'email' => 'deddy@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Defni, S.Si, M.Kom',
                'email' => 'defni@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan user Dosen lainnya sesuai kebutuhan

        // Menambahkan user sebagai Mahasiswa
            [
                'name' => 'Athira Rahmadini',
                'email' => 'athira@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cindy Steffani',
                'email' => 'cindy@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Muhammad Ar-razi A gazali',
                'email' => 'razi@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Winaldo Ageng Kalimasada',
                'email' => 'winaldo@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Fitri Sakinah',
                'email' => 'fitri@pnp.ac.id',
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan user Mahasiswa lainnya sesuai kebutuhan
        ]);

    }
 }