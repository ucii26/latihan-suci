@extends('layouts.app')

@section('title', 'Berita')

@section('content')
  <div class="container page berita-page">
    <h2>Berita Terbaru</h2>

    @php
      $daftarBerita = [
        [
          'judul' => 'Perubahan Kurikulum 2025',
          'isi' => 'Pemerintah mengumumkan perubahan kurikulum nasional yang akan berlaku mulai tahun ajaran depan. Perubahan ini mencakup peningkatan materi teknologi, literasi digital, dan pengembangan karakter.'
        ],
        [
          'judul' => 'Inovasi Teknologi Hijau',
          'isi' => 'Perusahaan rintisan meluncurkan teknologi baru ramah lingkungan yang dapat mengurangi polusi udara dan limbah industri secara signifikan.'
        ],
        [
          'judul' => 'Festival Budaya Lokal',
          'isi' => 'Komunitas lokal menyelenggarakan festival budaya dengan pertunjukan seni tradisional, kuliner khas, dan bazar kreatif.'
        ],
      ];
    @endphp

    <div class="berita-list">
      @foreach($daftarBerita as $berita)
        <div class="berita-item">
          <h3>{{ $berita['judul'] }}</h3>
          <p>{{ $berita['isi'] }}</p>
          <a href="#" class="read-more">Read more &raquo;</a>
        </div>
      @endforeach
    </div>
  </div>
@endsection