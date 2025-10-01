@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="container page home-page">
    <h2>Welcome to MySite</h2>
    <p>Halo! Ini adalah halaman utama (Home). Terima kasih sudah mengunjungi website ini.</p>

    <section class="features">
      <div class="feature-card">
        <h3>Fitur Unggulan 1</h3>
        <p>Deskripsi fitur pertama yang menarik untuk ditampilkan.</p>
      </div>
      <div class="feature-card">
        <h3>Fitur Unggulan 2</h3>
        <p>Deskripsi fitur kedua yang membantu pengguna.</p>
      </div>
      <div class="feature-card">
        <h3>Fitur Unggulan 3</h3>
        <p>Deskripsi fitur ketiga yang keren dan berbeda.</p>
      </div>
    </section>
  </div>
@endsection