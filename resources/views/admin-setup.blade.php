@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg mt-5">
                <div class="card-header bg-gradient text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-lock"></i> Setup Admin Pertama Kali
                    </h3>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">
                        Silakan buat akun admin pertama untuk mengelola aplikasi Divp.
                    </p>

                    <form method="POST" action="/admin-setup">
                        @csrf

                        <!-- Nama -->
                        <div class="form-group">
                            <label for="name">
                                <i class="fas fa-user"></i> Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                                   value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" placeholder="Masukkan email Anda"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i> Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Minimal 8 karakter"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" 
                                            type="button" data-target="#password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group">
                            <label for="password_confirmation">
                                <i class="fas fa-lock"></i> Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Ulangi password Anda" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" 
                                            type="button" data-target="#password_confirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alert Info -->
                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle"></i>
                            <strong>Informasi Penting:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Akun ini akan memiliki role <strong>Admin</strong></li>
                                <li>Anda dapat menambah, mengedit, dan menghapus data mahasiswa</li>
                                <li>Password minimal 8 karakter</li>
                                <li>Simpan password Anda dengan aman</li>
                            </ul>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">
                            <i class="fas fa-check"></i> Buat Admin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const inputField = document.querySelector(targetId);
            const icon = this.querySelector('i');

            if (inputField.type === 'password') {
                inputField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                inputField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>
@endsection
