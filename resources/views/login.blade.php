@extends('layouts.main')

@section('content')
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15); overflow: hidden; max-width: 450px; width: 100%;">
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); color: white; padding: 40px 20px; text-align: center;">
            <h1 style="font-size: 2rem; font-weight: 900; margin: 0; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                <i class="fas fa-lock"></i> Login
            </h1>
            <p style="font-size: 0.95rem; opacity: 0.95; margin-top: 10px;">Masuk ke akun Anda</p>
        </div>

        <!-- Form Content -->
        <div style="padding: 40px 30px;">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-left: 4px solid #DC2626; background: #FEE2E2; color: #7F1D1D; border: none;">
                    <strong style="color: #7F1D1D;"><i class="fas fa-exclamation-circle"></i> Login Gagal!</strong>
                    <ul class="mb-0 mt-2" style="margin-left: 10px; color: #7F1D1D;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="filter: brightness(0) invert(1);"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                
                <div style="margin-bottom: 25px;">
                    <label for="email" class="form-label" style="color: #1E3A8A; font-weight: 700;">Email Address</label>
                    <input type="email" class="form-control" 
                           id="email" name="email" value="{{ old('email') }}" 
                           placeholder="Masukkan email Anda" required autofocus
                           style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="password" class="form-label" style="color: #1E3A8A; font-weight: 700;">Password</label>
                    <div class="input-group" style="border: 2px solid #3B82F6; border-radius: 10px; overflow: hidden;">
                        <input type="password" class="form-control" 
                               id="password" name="password" placeholder="Masukkan password" required
                               style="border: none; padding: 12px 16px;">
                        <button class="btn" type="button" id="togglePassword" style="background: #3B82F6; color: white; border: none; padding: 12px 16px; font-weight: 700;">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div style="margin-bottom: 25px; display: flex; align-items: center;">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" style="width: 20px; height: 20px; cursor: pointer;">
                    <label for="remember" style="margin-left: 10px; margin-bottom: 0; color: #555; font-weight: 500; cursor: pointer;">Ingat saya</label>
                </div>
                
                <button type="submit" class="btn w-100 mb-3" style="background: #3B82F6; color: white; font-weight: 800; padding: 14px 30px; border: none; border-radius: 10px;">
                    <i class="fas fa-sign-in-alt"></i> Login Sekarang
                </button>
            </form>

            <hr style="border: 1px solid #E5E7EB; margin: 25px 0;">
            
            <div style="text-align: center; margin-bottom: 20px;">
                <a href="{{ route('password.request') }}" style="color: #3B82F6; font-weight: 600; text-decoration: none;">
                    <i class="fas fa-question-circle"></i> Lupa Password?
                </a>
            </div>

            <p style="text-align: center; color: #555; margin-bottom: 25px;">
                Belum punya akun? <a href="{{ route('register') }}" style="color: #3B82F6; font-weight: 700; text-decoration: none;">Daftar di sini</a>
            </p>

            <div style="background: #EFF6FF; padding: 20px; border-radius: 10px; border-left: 4px solid #3B82F6;">
                <p style="font-weight: 700; color: #1E3A8A; margin-bottom: 12px; text-transform: uppercase; font-size: 0.9rem;">
                    <i class="fas fa-info-circle"></i> Akun Demo:
                </p>
                <p style="margin-bottom: 8px; color: #555;"><strong>📧 Email:</strong> admin@example.com</p>
                <p style="margin: 0; color: #555;"><strong>🔐 Password:</strong> password</p>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function(e) {
    e.preventDefault();
    const passwordInput = document.getElementById('password');
    const toggleBtn = this;
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = 'password';
        toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
    }
});
</script>
@endsection
