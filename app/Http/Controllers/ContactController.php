<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Tampilkan halaman contact
    public function index()
    {
        return view('contact', [
            "title" => "Contact",
        ]);
    }

    // Proses pengiriman form contact
    public function send(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'subject.required' => 'Subjek harus diisi',
            'subject.max' => 'Subjek maksimal 255 karakter',
            'message.required' => 'Pesan harus diisi',
            'message.min' => 'Pesan minimal 10 karakter',
        ]);

        try {
            // kirim email ke alamat administrator yang ditetapkan dalam konfigurasi
                        Mail::raw("Pesan dari: {$validated['name']} <{$validated['email']}>\n\n" .
                                "Subjek: {$validated['subject']}\n\n{$validated['message']}", function ($m) use ($validated) {
                                $m->to(config('mail.from.address'))
                                    ->replyTo($validated['email'])
                                    ->subject('Form Kontak: ' . $validated['subject']);
                        });

            return redirect()->route('contact.index')
                           ->with('success', 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }
}
