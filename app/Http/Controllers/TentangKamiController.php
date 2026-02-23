<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tentangKami = TentangKami::first();
        return view('tentang-kami.index', [
            'title' => 'Tentang Kami',
            'tentangKami' => $tentangKami
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tentang-kami.create', [
            'title' => 'Tambah Tentang Kami'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string'
        ]);

        TentangKami::create($validated);
        return redirect()->route('tentang-kami.index')->with('success', 'Data Tentang Kami berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        // Jika tidak ada ID (public view), ambil yang pertama
        if ($id === null) {
            $tentangKami = TentangKami::first();
        } else {
            $tentangKami = TentangKami::findOrFail($id);
        }
        
        return view('tentang-kami.show', [
            'title' => 'Tentang Kami',
            'tentangKami' => $tentangKami
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        return view('tentang-kami.edit', [
            'title' => 'Edit Tentang Kami',
            'tentangKami' => $tentangKami
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string'
        ]);

        $tentangKami->update($validated);
        return redirect()->route('tentang-kami.index')->with('success', 'Data Tentang Kami berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        $tentangKami->delete();
        return redirect()->route('tentang-kami.index')->with('success', 'Data Tentang Kami berhasil dihapus');
    }
}

