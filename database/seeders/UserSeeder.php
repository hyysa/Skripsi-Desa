<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data existing jika ada
        DB::table('users')->truncate();

        // Tambahkan data baru
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@pandanarum.com',
                'password' => Hash::make('desa#5758'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
