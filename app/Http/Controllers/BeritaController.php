<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        return view('berita', [
            "title" => "Berita",
            "berita" => Berita::ambildata(),
        ]);
    }

    public function tampildata($slugp)  {

        return view('singleberita', [
            "title" => "Berita", 
            "new_berita" => Berita::caridata($slugp),
        ]);
    }
}
