<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {

        $data = Mahasiswa::all();

       
        return view('Mahasiswa', compact('data'),[
            "title" => "Data Mahasiswa",
            
        ]);
    }
    public function tambahmahasiswa()
    {
        return view('tambahmahasiswa',[
            "title" => "Tambah Data Mahasiswa",
        ]);
    }

    public function insertdata(Request $request)
    {
        // Validasi input termasuk NIM unik
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|integer|unique:mahasiswas,nim',
            'prodi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nohp' => 'required|string|max:15',
        ], [
            'nim.unique' => 'NIM sudah terdaftar di database. Gunakan NIM yang berbeda!',
            'name.required' => 'Nama harus diisi',
            'nim.required' => 'NIM harus diisi',
            'prodi.required' => 'Program Studi harus diisi',
            'email.required' => 'Email harus diisi',
            'nohp.required' => 'Nomor HP harus diisi',
        ]);

        $data = Mahasiswa::create($validated);

        return redirect()->route('datamahasiswa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function detail($id)
    {
        $data = Mahasiswa::find($id);

        return view("detail", [
            "title" => "Detail Mahasiswa",
            "data" => $data,
        ]);
    }

    public function tampildata($id)
    {
        $data = Mahasiswa::find($id);

        return view("edit", [
            "title" => "Edit Mahasiswa",
            "data" => $data,
        ]);
    }

    public function editdata(Request $request, $id)
    {
        // Validasi input dengan NIM unik kecuali untuk data yang sedang diedit
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|integer|unique:mahasiswas,nim,' . $id,
            'prodi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nohp' => 'required|string|max:15',
        ], [
            'nim.unique' => 'NIM sudah terdaftar di database. Gunakan NIM yang berbeda!',
            'name.required' => 'Nama harus diisi',
            'nim.required' => 'NIM harus diisi',
            'prodi.required' => 'Program Studi harus diisi',
            'email.required' => 'Email harus diisi',
            'nohp.required' => 'Nomor HP harus diisi',
        ]);

        $data = Mahasiswa::find($id);
        $data->update($validated);

        return redirect()->route('datamahasiswa')->with('success', 'Data Berhasil Di Edit!');
    }

public function delete($id)
{
    $data = Mahasiswa::find($id);
    $data->delete();
    
    return redirect('/datamahasiswa')->with('success', 'Data Berhasil Dihapus!');
}

}