<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            [
                'nama' => 'suci', 
                'nim' => '123', 
                'prodi' => 'TI', 
                'email' => 'john@mail.com', 
                'no_hp' => '0812'
            ],
            [
                'nama' => 'dea', 
                'nim' => '124', 
                'prodi' => 'SI', 
                'email' => 'doe@mail.com', 
                'no_hp' => '0813'
            ],
        ];
        return view('index', compact('mahasiswa'));
    }
}