<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([ProdiSeeder::class,]);
        $this->call([studentseeder::class,]);
        $this->call([LecturerSeeder::class,]);
        $this->call([RoomSeeder::class,]);
        $this->call([SesiSeeder::class,]);
       
    }
}
