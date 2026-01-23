<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminSetupController extends Controller
{
    /**
     * Tampilkan form untuk membuat admin pertama kali
     */
    public function showAdminSetupForm()
    {
        // Cek apakah sudah ada admin di database
        if (User::where('role', 'admin')->exists()) {
            return redirect('/login')->with('info', 'Admin sudah ada. Silakan login.');
        }

        return view('admin-setup', [
            'title' => 'Setup Admin'
        ]);
    }

    /**
     * Proses pembuatan admin pertama kali
     */
    public function setupAdmin(Request $request)
    {
        // Cek apakah sudah ada admin
        if (User::where('role', 'admin')->exists()) {
            return redirect('/login')->with('error', 'Admin sudah ada.');
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak cocok dengan konfirmasi',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Buat user dengan role admin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Set role sebagai admin
        ]);

        return redirect('/login')->with('success', 'Admin berhasil dibuat! Silakan login dengan akun admin Anda.');
    }
}
