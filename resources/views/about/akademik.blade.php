@extends('layouts.main')

@section('content')
<div class="container" style="padding:80px 0;">
  <!-- Images removed per user request -->
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
