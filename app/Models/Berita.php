<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
       private static $data_berita = [
        [
            "judul" => "tragedi pesawat kecelakaan ",
            "slug" => "tragedi-pesawat-kecelakaan",
            "penulis" => "tri",
            "konten" => "korban belum ditemukan",
        ],
        [
            "judul" => "Berita Makanan Gratis",
            "slug"=> "berita-makanan-gratis",
            "penulis" => "Adi",
            "konten" => "Program Makanan Gratis Di Unimus Hanya Menunjukan KTM Saja",
        ],
        [
            "judul" => "program studi teknologi informasi",
            "slug"=> "program-studi-teknologi-informasi",
            "penulis" => "jeni",
            "konten" => "Prodi Teknlogoi Informasi Di Unimus Menjadi Prodi Terbaik Di Tahun 2025",
        ],
    ];

    public static function ambildata()
    {
        return Self:: $data_berita;
    }

    public static function caridata ($slug)
    {
        $data_beritas = Self:: $data_berita;

            $new_berita = [];
    foreach($data_beritas as $berita)
    {
        if ($berita["slug"] === $slug)
        {
            $new_berita = $berita;
        }
    }

    return $new_berita;

    }
}