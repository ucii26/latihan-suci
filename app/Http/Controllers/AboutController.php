<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function akademik()
    {
        return view('about.akademik', ['title' => 'Akademik & Kurikulum']);
    }

    public function kehidupan()
    {
        return view('about.kehidupan', ['title' => 'Kehidupan Mahasiswa']);
    }

    public function riset()
    {
        return view('about.riset', ['title' => 'Riset & Inovasi']);
    }
}
