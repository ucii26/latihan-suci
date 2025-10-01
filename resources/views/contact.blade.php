@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <div class="container page contact-page">
    <h2>Contact Us</h2>
    <p>Silakan isi formulir di bawah untuk menghubungi kami:</p>

    @if(session('success'))
      <div class="alert success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/contact/send') }}" method="POST" class="contact-form">
      @csrf
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
        @error('name')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email Anda" value="{{ old('email') }}" required>
        @error('email')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="message">Pesan</label>
        <textarea name="message" id="message" rows="5" placeholder="Tulis pesan Anda..." required>{{ old('message') }}</textarea>
        @error('message')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="btn-send">Kirim</button>
    </form>
  </div>
@endsection