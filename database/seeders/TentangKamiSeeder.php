<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangKami;

class TentangKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create default if table is empty
        if (TentangKami::count() === 0) {
            TentangKami::create([
                'judul' => 'Tentang SUCI — Sistem Informasi Kampus',
                'konten' => "Selamat datang di SUCI — platform informasi dan manajemen data mahasiswa.\n\nSUCI bertujuan untuk menyediakan akses mudah terhadap berita, data akademik, dan layanan kampus. Kami berkomitmen terhadap kualitas pendidikan, inovasi teknologi, dan pengembangan komunitas yang inklusif.\n\nMisi kami:\n- Menyediakan informasi yang akurat dan cepat.\n- Mendukung proses pembelajaran berbasis teknologi.\n- Membangun komunitas mahasiswa yang produktif dan kolaboratif.",
            ]);
        }
    }
}
