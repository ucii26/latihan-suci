@extends('layouts.main')

@section('content')
<div class="container" style="padding:80px 0;">
  <div style="text-align:center; margin-bottom:30px;">
    @if (file_exists(public_path('images/about-kehidupan.jpg')))
      <img src="{{ asset('images/about-kehidupan.jpg') }}" alt="Kehidupan Mahasiswa" style="max-width:480px; width:100%; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06);" />
    @else
      <img src="{{ asset('images/about-kehidupan.svg') }}" alt="Kehidupan Mahasiswa" style="max-width:480px; width:100%; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06);" />
    @endif
  </div>
  <h1 style="color:#1E3A8A; font-weight:900; margin-bottom:20px;">Kehidupan Mahasiswa</h1>
  <p style="font-size:1.05rem; color:#475569; line-height:1.8;">Kehidupan kampus penuh kegiatan: organisasi mahasiswa, lomba, workshop, dan dukungan pengembangan soft-skill. Kami mendukung lingkungan yang inklusif dan kreatif.</p>

  <h3 style="margin-top:30px;">Fasilitas & Kegiatan</h3>
  <ul>
    <li>Organisasi kemahasiswaan aktif</li>
    <li>Pusat karir dan pembinaan soft-skill</li>
    <li>Program pertukaran dan komunitas riset</li>
  </ul>

  <a href="{{ url('/about') }}" class="btn btn-secondary" style="margin-top:30px;">Kembali</a>
</div>
@endsection
