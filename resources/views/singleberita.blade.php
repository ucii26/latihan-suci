@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8 fade-in">
      <article class="card shadow-lg">
        <div class="card-body p-5">
          <h1 class="mb-3" style="color: #6B4423; font-weight: 800;">{{ $new_berita["judul"] }}</h1>
          
          <p class="text-muted mb-4" style="font-style: italic; font-size: 0.95rem;">
            <strong>Penulis:</strong> {{ $new_berita["penulis"] }}
          </p>

          <hr style="border-color: #E8DCC8;">

          <div style="color: #4A3728; line-height: 1.8; font-size: 1.05rem;">
            {!! nl2br($new_berita["konten"]) !!}
          </div>

          <hr style="border-color: #E8DCC8; margin-top: 30px;">

          <div class="text-center mt-4">
            <a href="{{ url('/berita') }}" class="btn btn-primary">
              ← Kembali ke Berita
            </a>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>
@endsection