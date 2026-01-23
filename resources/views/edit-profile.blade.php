@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-edit"></i> Edit Profil</h3>
                </div>
                <div class="card-body p-5">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi Kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/update-profile') }}">
                        @csrf

                        <!-- Nama -->
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', Auth::user()->name) }}" 
                                   placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                                   placeholder="Masukkan email" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Current Email Info -->
                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle"></i>
                            <strong>Catatan:</strong> Silakan update informasi profil Anda. Email yang diubah harus unik dan belum terdaftar.
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="/my-profile" class="btn btn-secondary btn-lg flex-grow-1">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card shadow-lg mt-4">
                <div class="card-body">
                    <p class="mb-1"><strong>Role Akun:</strong> {{ ucfirst(Auth::user()->role) }}</p>
                    <p class="mb-1"><strong>Terdaftar:</strong> {{ Auth::user()->created_at->format('d M Y H:i') }}</p>
                    <p class="mb-0"><strong>ID User:</strong> #{{ Auth::user()->id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
