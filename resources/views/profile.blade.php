@extends('layouts.main')

@section('content')
<div class="hero-section">
  <div class="container">
    <h1>👤 Profil Pembuat</h1>
    <p>Kenali lebih jauh tentang pembuat website ini</p>
  </div>
</div>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 fade-in">
        <div class="card shadow-lg" style="border-top: 6px solid; border-image: linear-gradient(90deg, #FF6B6B, #FFA500, #FFD700) 1;">
          <div class="card-body p-5 text-center">
            @if($foto)
              <div style="margin-bottom: 30px;">
                <img src="{{ $foto }}" alt="Foto Profil" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 5px solid #FF6B6B; box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3); animation: bounce 2s ease-in-out infinite;">
              </div>
            @endif

            <div style="margin-bottom: 30px;">
              <h2 style="background: linear-gradient(135deg, #FF6B6B, #FFA500, #FFD700); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 900; font-size: 2rem;">{{ $nama }}</h2>
              <p style="color: #1ABC9C; font-size: 1.1rem; font-weight: 700; margin-top: 10px;">Pembuat Website Suci</p>
            </div>

            <div style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 165, 0, 0.1)); border-radius: 15px; padding: 25px; margin: 25px 0;">
              <div style="margin-bottom: 20px; padding: 15px; background: var(--white); border-radius: 10px; border-left: 4px solid #FF6B6B;">
                <p style="color: #8B6F47; margin: 0; font-size: 0.95rem;"><strong style="color: #FF6B6B;">📱 Nomor HP:</strong> {{ $nohp ?? 'Tidak tersedia' }}</p>
              </div>
            </div>
              </div>
            </div>

            <div class="text-center">
              <a href="/" class="btn btn-primary btn-lg" style="padding: 15px 40px;">
                <i class="fas fa-arrow-left"></i> Kembali ke Home
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
</style>
@endsection