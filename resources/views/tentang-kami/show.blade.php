@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); padding: 100px 0; color: white; text-align: center; margin-bottom: 50px;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: 900; margin-bottom: 15px; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
            <i class="fas fa-info-circle"></i> Tentang Kami
        </h1>
        <p style="font-size: 1.2rem; opacity: 0.95;">Mengenal lebih dekat tentang institusi kami</p>
    </div>
</div>

<section style="padding: 80px 0; background: #F8FAFC;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        @if($tentangKami)
          <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.08); padding: 60px; border-top: 8px solid #3B82F6;">
            
            <h2 style="color: #1E3A8A; font-weight: 900; margin-bottom: 40px; font-size: 2.5rem; text-align: center;">
              {{ $tentangKami->judul }}
            </h2>

            <div style="color: #475569; line-height: 2; font-size: 1.1rem; text-align: justify; max-width: 900px; margin: 0 auto;">
              {!! nl2br(e($tentangKami->konten)) !!}
            </div>

            <!-- Decorative Elements -->
            <div style="display: flex; gap: 20px; margin-top: 60px; justify-content: center; flex-wrap: wrap;">
              <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1)); border-radius: 15px; padding: 30px; text-align: center; border-left: 5px solid #3B82F6;">
                <i class="fas fa-book-reader" style="font-size: 2.5rem; color: #3B82F6; margin-bottom: 15px;"></i>
                <h4 style="color: #1E3A8A; margin-bottom: 10px;">Akademik & Kurikulum</h4>
                <p style="color: #666; margin: 0;">Berkualitas, relevan, dan berbasis industri</p>
              </div>
              <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1)); border-radius: 15px; padding: 30px; text-align: center; border-left: 5px solid #3B82F6;">
                <i class="fas fa-user-friends" style="font-size: 2.5rem; color: #3B82F6; margin-bottom: 15px;"></i>
                <h4 style="color: #1E3A8A; margin-bottom: 10px;">Kehidupan Mahasiswa</h4>
                <p style="color: #666; margin: 0;">Aktivitas, organisasi, dan dukungan kemahasiswaan</p>
              </div>
              <div style="flex: 1; min-width: 200px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1)); border-radius: 15px; padding: 30px; text-align: center; border-left: 5px solid #3B82F6;">
                <i class="fas fa-lightbulb" style="font-size: 2.5rem; color: #3B82F6; margin-bottom: 15px;"></i>
                <h4 style="color: #1E3A8A; margin-bottom: 10px;">Riset & Inovasi</h4>
                <p style="color: #666; margin: 0;">Mendorong penelitian dan solusi teknologi</p>
              </div>
            </div>

          </div>
        @else
          <!-- Empty State -->
          <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.08); padding: 100px 40px; text-align: center;">
            <i class="fas fa-folder-open" style="font-size: 5rem; color: #CBD5E1; margin-bottom: 30px;"></i>
            <h3 style="color: #64748B; margin-bottom: 20px; font-size: 1.5rem;">Belum Ada Konten Tentang Kami</h3>
            <p style="color: #94A3B8; font-size: 1.05rem;">Halaman ini sedang dalam pembaruan. Mohon tunggu...</p>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); padding: 80px 0; color: white; text-align: center;">
  <div class="container">
    <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 20px;">Bergabunglah dengan Kami</h2>
    <p style="font-size: 1.1rem; margin-bottom: 40px; opacity: 0.95;">Mari bersama-sama membangun masa depan yang lebih baik</p>
    <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
      <a href="/datamahasiswa" style="background: white; color: #1E3A8A; border: none; padding: 15px 40px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(0, 0, 0, 0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
        <i class="fas fa-users"></i> Lihat Data Mahasiswa
      </a>
      <a href="/berita" style="background: transparent; color: white; border: 2px solid white; padding: 15px 40px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block;" onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(0, 0, 0, 0.2)'" onmouseout="this.style.backgroundColor='transparent'; this.style.transform='none'; this.style.boxShadow='none'">
        <i class="fas fa-newspaper"></i> Baca Berita Terbaru
      </a>
    </div>
  </div>
</section>
@endsection
