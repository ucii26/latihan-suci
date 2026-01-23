<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class HapusController extends Controller
{
    public function destroy($id)
    {
        // Cari data mahasiswa berdasarkan id
        $mahasiswa = Mahasiswa::find($id);

        // Kalau tidak ditemukan, kembali dengan error
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa')->with('error', 'Data tidak ditemukan!');
        }

        // Hapus datanya
        $mahasiswa->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('mahasiswa')->with('success', 'Data berhasil dihapus!');
    }
}