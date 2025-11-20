@extends('layouts.app')

@section('title', 'Berita')

@section('content')
  <div class="container page berita-page">
    <h2>Berita Terbaru</h2>

    @php
    //Data berita
      $daftarBerita = [
        [
          'judul' => 'Perubahan Kurikulum 2025',
          'slug' => 'Prubahan-Kurikulum-2025',
          'penulis' => 'suci',
          'isi' => 'Pemerintah mengumumkan perubahan kurikulum nasional yang akan berlaku mulai tahun ajaran depan. Perubahan ini mencakup peningkatan materi teknologi, literasi digital, dan pengembangan karakter.'
        ],
        [
          'judul' => 'Inovasi Teknologi Hijau',
          'slug' => 'Prubahan-Kurikulum-2025',
          'penulis' => 'suci',
          'isi' => 'Perusahaan rintisan meluncurkan teknologi baru ramah lingkungan yang dapat mengurangi polusi udara dan limbah industri secara signifikan.'
        ],
        [
          'judul' => 'Festival Budaya Lokal',
          'slug' => 'Prubahan-Kurikulum-2025',
          'penulis' => 'suci',
          'isi' => 'Komunitas lokal menyelenggarakan festival budaya dengan pertunjukan seni tradisional, kuliner khas, dan bazar kreatif.'
        ],
      ];

      // Tangkap slug dari URL (jika ada)
      $slug = request()->segment(2);

      // Cek apakah slug cocok dengan salah satu berita
      $beritaDipilih = collect($daftarBerita)->firstWhere('slug', $slug);
    @endphp

    {{--Jika slug tidak ada, tampilkan daftar berita --}}
    @if(!$slug)
      <h2>Berita Terbaru</h2>
      <div class="berita-list">
        @foreach($daftarBerita as $berita)
          <div class="berita-item">
            <h3>{{ $berita['judul'] }}</h3>
            <p>{{ $berita['isi'] }}</p>
            <a href="#" class="read-more">Read more &raquo;</a>
          </div>
        @endforeach
      </div>
    {{-- Jika slug cocok, tampilan halaman detail --}}
    @elseif($beritaDipilih)
      <div class="berita-detail">
        <h2>{{ $beritaDipilih['judul'] }}</h2>
        <p><strong>Penulis:</strong> {{$beritaDipilih['penulis'] }}</p>
        <p>{{ $beritaDipilih['isi'] }}</p>

        <a href="{{ url('/berita') }}" class="btn btn-primary mt-3"> Kembali ke Daftar
      </div>

     {{-- Jika slug tidak cocok, tampilan halaman detail --}}
    @elseif($beritaDipilih)
      <div class="berita-detail">
        <h2>{{ $beritaDipilih['judul'] }}</h2>
        <p><strong>Penulis:</strong> {{$beritaDipilih['penulis'] }}</p>
        <p>{{ $beritaDipilih['isi'] }}</p>

        <a href="{{ url('/berita') }}" class="btn btn-primary mt-3"> Kembali ke Daftar
  </div>

@endsection