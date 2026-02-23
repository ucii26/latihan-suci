@extends('layouts.main')

@section('content')
<div class="container" style="padding:80px 0;">
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
