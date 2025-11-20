<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index ()
    {

        $data = Mahasiswa::all();
        
        return view('mahasiswa', compact('data'), [
            "title" => "Data Mahasiswa",
            
        ]);
    }

    public function tambahmahasiswa ()
    {
        return view('tambahmahasiswa', [
            "title" => "Tambah Data Mahasiswa",
        ]);
    }

    public function insertdata(Request $request)
    {
        /// insert data to data
        Mahasiswa::create($request -> all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambah!');
    }

    public function tampildata($id)
    {
        $data = Mahasiswa::find($id);
        
        return view("edit",  [
            "title" => "Edit Data Mahasiswa",
            "data" => $data,
        ]);
    }

    public function editdata(Request $request, $id)
    {
        $data = Mahasiswa::find($id);

        $data->update($request->all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Edit!');
    }
}
