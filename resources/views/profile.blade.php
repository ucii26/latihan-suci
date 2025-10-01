@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <div class="container page profile-page">
    <h2>Profil Pengguna</h2>
    <div class="profile-wrapper">
      <!-- Foto Profil -->
      <div class="profile-photo">
        <img src="{{ asset('suci.tmp') }}" alt="Foto Profil Suci Ridha Fatanah Nento">
      </div>

      <!-- Info Profil -->
      <div class="profile-info">
        <p><strong>Nama:</strong> Suci Ridha Fatanah Nento</p>
        <p><strong>Email:</strong> sucifathanahnento@gmail.com</p>
        <p><strong>Deskripsi:</strong> Saya seorang pelajar / mahasiswa / web developer pemula. Saya sedang belajar membuat aplikasi web menggunakan Laravel dan mencoba membangun tampilan dinamis ini.</p>
      </div>
    </div>
  </div>
@endsection