<?php

namespace Database\Seeders;

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
        // Nonaktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus data dari tabel users
        DB::table('users')->truncate();

        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Masukkan data baru
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@pandanarum.com',
                'password' => Hash::make('!Des@#5758'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
