<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan profil user yang sedang login
     */
    public function myProfile()
    {
        $user = Auth::user();
        
        return view('my-profile', [
            'title' => 'My Profile',
            'user' => $user
        ]);
    }

    /**
     * Tampilkan halaman edit profil
     */
    public function editProfile()
    {
        $user = Auth::user();
        
        return view('edit-profile', [
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    /**
     * Update profil user
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ], [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $user->update($validated);

        return redirect('/my-profile')->with('success', 'Profil berhasil diupdate!');
    }
}
