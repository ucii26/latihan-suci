@extends('layouts.main')

@section('content')
<div class="container" style="padding:80px 0;">
  <div style="text-align:center; margin-bottom:30px;">
    @if (file_exists(public_path('images/about-akademik.jpg')))
      <img src="{{ asset('images/about-akademik.jpg') }}" alt="Akademik" style="max-width:480px; width:100%; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06);" />
    @else
      <img src="{{ asset('images/about-akademik.svg') }}" alt="Akademik" style="max-width:480px; width:100%; border-radius:12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06);" />
    @endif
  </div>
  <h1 style="color:#1E3A8A; font-weight:900; margin-bottom:20px;">Akademik & Kurikulum</h1>
  <p style="font-size:1.05rem; color:#475569; line-height:1.8;">Kami menawarkan program akademik yang dirancang untuk relevansi industri dan kualitas pengajaran. Kurikulum terus diperbarui berdasarkan masukan akademik dan kebutuhan pasar kerja.</p>

  <h3 style="margin-top:30px;">Program Unggulan</h3>
  <ul>
    <li>Program studi dengan akreditasi unggul</li>
    <li>Kerjasama industri untuk magang dan penelitian</li>
    <li>Fasilitas laboratorium modern dan dosen berpengalaman</li>
  </ul>

  <a href="{{ url('/about') }}" class="btn btn-secondary" style="margin-top:30px;">Kembali</a>
</div>
@endsection
