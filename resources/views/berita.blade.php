@extends('layouts.main')

@section('content')
<div class="hero-section">
    <div class="container">
        <h1>
            <i class="fas fa-newspaper"></i> Berita Terbaru
        </h1>
        <p>Informasi terkini dan artikel menarik untuk Anda</p>
    </div>
</div>

<section class="py-5">
  <div class="container">
    @forelse($beritas as $berita)
    @if($loop->first)
    <!-- Featured Article -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto fade-in">
            <div class="card shadow-lg overflow-hidden">
                <div class="card-body p-5">
                    <div class="label-featured">
                        <i class="fas fa-star"></i> FEATURED
                    </div>
                    <a href="/berita/{{ $berita['slug'] }}" style="text-decoration: none;">
                        <h2 style="color: #6B4423; font-weight: 900; margin-bottom: 15px; font-size: 2.2rem;">
                            {{ $berita['judul'] }}
                        </h2>
                    </a>
                    <p style="color: #8B6F47; margin-bottom: 20px;">
                        <i class="fas fa-user-circle"></i> <strong>{{ $berita['penulis'] }}</strong> | 
                        <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::now()->format('d M Y') }}
                    </p>
                    <p style="color: #555; font-size: 1.1rem; line-height: 1.8; margin-bottom: 25px;">
                        {{ Str::limit($berita['konten'] ?? '', 250) }}
                    </p>
                    <a href="/berita/{{ $berita['slug'] }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> Baca Artikel Lengkap
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    @if($loop->iteration == 2)
    <div class="row">
    @endif
        <div class="col-lg-4 col-md-6 mb-4 fade-in">
            <div class="card shadow-sm h-100" style="overflow: hidden;">
                <div style="background: linear-gradient(135deg, #E8DCC8, #F5F1E8); height: 150px; display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    <i class="fas fa-newspaper" style="color: #6B4423; opacity: 0.3;"></i>
                </div>
                <div class="card-body p-4">
                    <a href="/berita/{{ $berita['slug'] }}" style="text-decoration: none;">
                        <h5 style="color: #6B4423; font-weight: 700; margin-bottom: 12px; min-height: 60px;">
                            {{ Str::limit($berita['judul'], 50) }}
                        </h5>
                    </a>
                    <p style="color: #8B6F47; font-size: 0.9rem; margin-bottom: 10px;">
                        <i class="fas fa-user"></i> {{ $berita['penulis'] }}
                    </p>
                    <p style="color: #555; line-height: 1.6; font-size: 0.95rem;">
                        {{ Str::limit($berita['konten'] ?? '', 100) }}
                    </p>
                    <a href="/berita/{{ $berita['slug'] }}" style="color: #6B4423; text-decoration: none; font-weight: 600; display: inline-block; margin-top: 12px;">
                        Lanjutkan → 
                    </a>
                </div>
            </div>
        </div>
    @endif
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle" style="font-size: 2.5rem; margin-bottom: 15px;"></i>
                <p style="font-size: 1.1rem; margin: 0;">Belum ada berita yang tersedia saat ini.</p>
            </div>
        </div>
    @endforelse
    @if(count($beritas) > 1)
    </div>
    @endif
  </div>
</section>
@endsection