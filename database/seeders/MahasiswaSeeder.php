<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'nama' => 'Bon Jovi',
            'nim' => 12345678,
            'prodi' => 'Teknologi Informasi',
            'email' => 'farel@gmail.com',
            'nohp' => 62857326329,
        ]);
    }
}