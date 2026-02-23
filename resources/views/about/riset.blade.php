@extends('layouts.main')

@section('content')
<div class="container" style="padding:80px 0;">
  <h1 style="color:#1E3A8A; font-weight:900; margin-bottom:20px;">Riset & Inovasi</h1>
  <p style="font-size:1.05rem; color:#475569; line-height:1.8;">Kami mendorong penelitian interdisipliner dan inovasi teknologi. Dosen dan mahasiswa aktif dalam proyek riset yang berkontribusi pada masyarakat dan industri.</p>

  <h3 style="margin-top:30px;">Fokus Riset</h3>
  <ul>
    <li>Teknologi Informasi dan Transformasi Digital</li>
    <li>Pengembangan perangkat lunak dan AI</li>
    <li>Inovasi berbasis komunitas dan keberlanjutan</li>
  </ul>

  <a href="{{ url('/about') }}" class="btn btn-secondary" style="margin-top:30px;">Kembali</a>
</div>
@endsection
