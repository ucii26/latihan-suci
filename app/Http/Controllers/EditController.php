<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class EditController extends Controller
{
    public function edit($id)
    {
        // ambil data mahasiswa berdasarkan id
        $mahasiswa = Mahasiswa::find($id);

        // jika data tidak ditemukan, kembali ke list mahasiswa
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa')->with('error', 'Data tidak ditemukan!');
        }

        // tampilkan view edit dengan data mahasiswa
        return view('editmahasiswa', [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update(Request $request, $id)
    {
        // validasi input (opsional tapi disarankan)
        $request->validate([
            'name' => 'required',
            'nim'  => 'required',
            'prodi' => 'required'
        ]);

        // ambil data
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return redirect()->route('mahasiswa')->with('error', 'Data tidak ditemukan!');
        }

        // update data
        $mhs->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'email' => $request->email,
            'nohp' => $request->nohp,
        ]);

        return redirect()->route('mahasiswa')->with('success', 'Data berhasil diubah!');
    }
}