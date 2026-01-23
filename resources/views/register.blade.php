@extends('layouts.main')

@section('content')
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15); overflow: hidden; max-width: 500px; width: 100%;">
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); color: white; padding: 40px 20px; text-align: center;">
            <h1 style="font-size: 2rem; font-weight: 900; margin: 0; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                <i class="fas fa-user-plus"></i> Registrasi Akun
            </h1>
            <p style="font-size: 0.95rem; opacity: 0.95; margin-top: 10px;">Buat akun baru untuk memulai</p>
        </div>

        <!-- Form Content -->
        <div style="padding: 40px 30px;">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-left: 4px solid #DC2626; background: #FEE2E2; color: #7F1D1D; border: none;">
                    <strong style="color: #7F1D1D;"><i class="fas fa-exclamation-circle"></i> Registrasi Gagal!</strong>
                    <ul class="mb-0 mt-2" style="margin-left: 10px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group mb-4">
                    <label for="name" class="form-label" style="color: #1E3A8A; font-weight: 700;">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" 
                           placeholder="Masukkan nama lengkap Anda" required autofocus
                           style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px;">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="form-label" style="color: #1E3A8A; font-weight: 700;">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" 
                           placeholder="Masukkan email Anda" required
                           style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px;">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label for="password" class="form-label" style="color: #1E3A8A; font-weight: 700;">Password</label>
                    <div class="input-group" style="border: 2px solid #3B82F6; border-radius: 10px; overflow: hidden;">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" placeholder="Masukkan password (min 8 karakter)" required
                               style="border: none; padding: 12px 16px;">
                        <button class="btn" type="button" id="togglePassword" style="background: #3B82F6; color: white; border: none; padding: 12px 16px; font-weight: 700;">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation" class="form-label" style="color: #1E3A8A; font-weight: 700;">Konfirmasi Password</label>
                    <div class="input-group" style="border: 2px solid #3B82F6; border-radius: 10px; overflow: hidden;">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                               id="password_confirmation" name="password_confirmation" 
                               placeholder="Masukkan ulang password" required
                               style="border: none; padding: 12px 16px;">
                        <button class="btn" type="button" id="togglePasswordConfirm" style="background: #3B82F6; color: white; border: none; padding: 12px 16px; font-weight: 700;">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn w-100 mb-3" style="background: #3B82F6; color: white; font-weight: 800; padding: 14px 30px; border: none; border-radius: 10px;">
                    <i class="fas fa-check"></i> Buat Akun Sekarang
                </button>
            </form>

            <hr style="border: 1px solid #E5E7EB; margin: 25px 0;">
            <p class="text-center" style="color: #555;">Sudah punya akun? <a href="{{ route('login') }}" style="color: #3B82F6; font-weight: 700; text-decoration: none;">Login di sini</a></p>
        </div>
    </div>
</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function(e) {
    e.preventDefault();
    const input = document.getElementById('password');
    if (input.type === 'password') {
        input.type = 'text';
        this.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        input.type = 'password';
        this.innerHTML = '<i class="fas fa-eye"></i>';
    }
});

document.getElementById('togglePasswordConfirm').addEventListener('click', function(e) {
    e.preventDefault();
    const input = document.getElementById('password_confirmation');
    if (input.type === 'password') {
        input.type = 'text';
        this.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        input.type = 'password';
        this.innerHTML = '<i class="fas fa-eye"></i>';
    }
});
</script>
@endsection

