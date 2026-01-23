@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<div class="hero-section">
  <div class="container">
    <h1><i class="fas fa-info-circle"></i> Tentang Kami</h1>
    <p>Mengenal lebih jauh tentang tim dan misi kami</p>
  </div>
</div>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0 fade-in">
        <h2 style="background: linear-gradient(135deg, #FF6B6B, #FFA500, #FFD700); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 800; font-size: 2.5rem; margin-bottom: 30px;">
          Siapa Kami?
        </h2>
        <p style="font-size: 1.1rem; color: #6B4423; line-height: 1.9; margin-bottom: 20px; padding: 15px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(255, 165, 0, 0.05)); border-left: 4px solid #FF6B6B; border-radius: 8px;">
          🎯 Kami adalah tim yang berfokus pada pengembangan data dan memberikan berita terkini dengan standar kualitas tertinggi.
        </p>
        <p style="font-size: 1.1rem; color: #6B4423; line-height: 1.9; margin-bottom: 20px; padding: 15px; background: linear-gradient(135deg, rgba(26, 188, 156, 0.05), rgba(52, 152, 219, 0.05)); border-left: 4px solid #1ABC9C; border-radius: 8px;">
          💡 Misi kami adalah menghadirkan inovasi yang bermanfaat untuk pemula dan memberikan kemudahan akses informasi.
        </p>
        <p style="font-size: 1.1rem; color: #6B4423; line-height: 1.9; padding: 15px; background: linear-gradient(135deg, rgba(46, 204, 113, 0.05), rgba(155, 89, 182, 0.05)); border-left: 4px solid #2ECC71; border-radius: 8px;">
          🚀 Visi kami adalah menjadi solusi terdepan dalam manajemen data dan penyebaran informasi.
        </p>
      </div>
      <div class="col-md-6 fade-in">
        <div class="card shadow-lg" style="border: 3px solid #FFD700; background: linear-gradient(135deg, var(--white) 0%, var(--cream) 100%);">
          <div class="card-body p-5">
            <h3 style="background: linear-gradient(135deg, #FF6B6B, #FFA500); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 30px; font-weight: 800; font-size: 1.5rem;">
              <i class="fas fa-heart"></i> Nilai-Nilai Kami
            </h3>
            <ul style="list-style: none; padding: 0;">
              <li style="margin-bottom: 18px; padding: 15px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(255, 107, 107, 0.05)); border-left: 4px solid #FF6B6B; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 5px 15px rgba(255, 107, 107, 0.2)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <span style="color: #FF6B6B; font-weight: bold; font-size: 1.3rem; margin-right: 10px;">⚡</span>
                <strong style="color: #FF6B6B;">Inovasi:</strong> <span style="color: #6B4423;">Selalu mencari solusi terbaik</span>
              </li>
              <li style="margin-bottom: 18px; padding: 15px; background: linear-gradient(135deg, rgba(26, 188, 156, 0.1), rgba(26, 188, 156, 0.05)); border-left: 4px solid #1ABC9C; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 5px 15px rgba(26, 188, 156, 0.2)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <span style="color: #1ABC9C; font-weight: bold; font-size: 1.3rem; margin-right: 10px;">✨</span>
                <strong style="color: #1ABC9C;">Kualitas:</strong> <span style="color: #6B4423;">Standar profesional di setiap project</span>
              </li>
              <li style="margin-bottom: 18px; padding: 15px; background: linear-gradient(135deg, rgba(46, 204, 113, 0.1), rgba(46, 204, 113, 0.05)); border-left: 4px solid #2ECC71; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 5px 15px rgba(46, 204, 113, 0.2)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <span style="color: #2ECC71; font-weight: bold; font-size: 1.3rem; margin-right: 10px;">💪</span>
                <strong style="color: #2ECC71;">Dedikasi:</strong> <span style="color: #6B4423;">Komitmen penuh untuk kesuksesan</span>
              </li>
              <li style="padding: 15px; background: linear-gradient(135deg, rgba(155, 89, 182, 0.1), rgba(155, 89, 182, 0.05)); border-left: 4px solid #9B59B6; border-radius: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 5px 15px rgba(155, 89, 182, 0.2)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <span style="color: #9B59B6; font-weight: bold; font-size: 1.3rem; margin-right: 10px;">🤝</span>
                <strong style="color: #9B59B6;">Transparansi:</strong> <span style="color: #6B4423;">Komunikasi terbuka dengan klien</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Stats Section -->
    <div class="row mt-5 pt-5">
      <div class="col-md-3 mb-4 fade-in">
        <div style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.15), rgba(255, 165, 0, 0.15)); border-radius: 15px; padding: 30px; text-align: center; border: 2px solid #FF6B6B;">
          <div style="font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, #FF6B6B, #FFA500); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">100%</div>
          <p style="color: #6B4423; margin-top: 15px; font-weight: 700; font-size: 1.1rem;">Dedikasi</p>
        </div>
      </div>
      <div class="col-md-3 mb-4 fade-in">
        <div style="background: linear-gradient(135deg, rgba(26, 188, 156, 0.15), rgba(52, 152, 219, 0.15)); border-radius: 15px; padding: 30px; text-align: center; border: 2px solid #1ABC9C;">
          <div style="font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, #1ABC9C, #3498DB); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">500+</div>
          <p style="color: #6B4423; margin-top: 15px; font-weight: 700; font-size: 1.1rem;">Users</p>
        </div>
      </div>
      <div class="col-md-3 mb-4 fade-in">
        <div style="background: linear-gradient(135deg, rgba(46, 204, 113, 0.15), rgba(155, 89, 182, 0.15)); border-radius: 15px; padding: 30px; text-align: center; border: 2px solid #2ECC71;">
          <div style="font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, #2ECC71, #9B59B6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">50+</div>
          <p style="color: #6B4423; margin-top: 15px; font-weight: 700; font-size: 1.1rem;">Berita</p>
        </div>
      </div>
      <div class="col-md-3 mb-4 fade-in">
        <div style="background: linear-gradient(135deg, rgba(52, 152, 219, 0.15), rgba(230, 126, 34, 0.15)); border-radius: 15px; padding: 30px; text-align: center; border: 2px solid #3498DB;">
          <div style="font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, #3498DB, #E67E22); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">24/7</div>
          <p style="color: #6B4423; margin-top: 15px; font-weight: 700; font-size: 1.1rem;">Support</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
