@extends('layouts.main')

@section('content')
<div class="hero-section">
    <div class="container">
        <h1>
            <i class="fas fa-envelope"></i> Hubungi Kami
        </h1>
        <p>Kami senang mendengar dari Anda. Kirim pesan apapun kepada kami.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto fade-in">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check-circle"></i> Sukses!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama Anda"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="Masukkan email Anda"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor Telepon (Opsional)</label>
                            <input 
                                type="tel" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                placeholder="Masukkan nomor telepon Anda"
                            >
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subjek</label>
                            <input 
                                type="text" 
                                class="form-control @error('subject') is-invalid @enderror" 
                                id="subject" 
                                name="subject" 
                                value="{{ old('subject') }}"
                                placeholder="Masukkan subjek pesan"
                                required
                            >
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea 
                                class="form-control @error('message') is-invalid @enderror" 
                                id="message" 
                                name="message" 
                                rows="6" 
                                placeholder="Tulis pesan Anda di sini..."
                                required
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                            </button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-4 mb-4 fade-in">
                        <div class="card h-100 text-center">
                            <div class="card-body p-4">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h5 class="card-title mb-3">Alamat</h5>
                                <p class="card-text text-muted">
                                    Jl. Kedungmundu No.18<br>
                                    Kec. Tembalang, Kota. Semarang<br>
                                    Jawa Tengah, Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 fade-in">
                        <div class="card h-100 text-center">
                            <div class="card-body p-4">
                                <div class="icon-box">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <h5 class="card-title mb-3">Telepon</h5>
                                <p class="card-text text-muted">
                                    <a href="tel:+6281244449681" class="text-decoration-none">+62 81244449681</a><br>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4 fade-in">
                        <div class="card h-100 text-center">
                            <div class="card-body p-4">
                                <div class="icon-box">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                                <h5 class="card-title mb-3">Email</h5>
                                <p class="card-text text-muted">
                                    <a href="mailto:suci@gmail.com" class="text-decoration-none">suci@gmail.com</a><br>
                                    <a href="mailto:suci12@gmail.com" class="text-decoration-none">suci12@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</section>
@endsection