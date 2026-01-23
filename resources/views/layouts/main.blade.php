<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE SUCI - Data Mahasiswa Dan Berita</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/colorful.css">
    <link rel="stylesheet" href="/css/auth-forms.css">
</head>
<body>
    <!-- Enhanced Navbar with Three Dots Menu -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-enhanced">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="/">
        </a>

        <!-- Three Dots Menu for Right Side -->
        <div class="ml-auto">
            <div class="nav-item dropdown">
                <button class="btn btn-link nav-link" id="threeDotMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 24px; color: #3B82F6; transition: all 0.3s ease;" onmouseover="this.style.color='#1E3A8A'; this.style.transform='scale(1.15)'" onmouseout="this.style.color='#3B82F6'; this.style.transform='scale(1)'">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="threeDotMenu" style="border: none; border-radius: 15px; box-shadow: 0 15px 45px rgba(59, 130, 246, 0.2); background: white; padding: 10px 0; min-width: 260px;">
                    <a class="dropdown-item" href="/" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                        <i class="fas fa-home" style="width: 20px; color: #3B82F6; margin-right: 10px;"></i> Home
                    </a>
                    <a class="dropdown-item" href="{{ url('/profile') }}" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                        <i class="fas fa-user" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Profile
                    </a>
                    <a class="dropdown-item" href="/berita" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                        <i class="fas fa-newspaper" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Berita
                    </a>
                    <a class="dropdown-item" href="/contact" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                        <i class="fas fa-envelope" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Contact
                    </a>
                    <a class="dropdown-item" href="/datamahasiswa" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease; background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(96, 165, 250, 0.15));" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.25), rgba(96, 165, 250, 0.25))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(96, 165, 250, 0.15))'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                        <i class="fas fa-book" style="width: 20px; color: #3B82F6; margin-right: 10px; font-weight: 700;"></i> <span style="color: #3B82F6; font-weight: 700;">Data Mahasiswa</span>
                    </a>
                    
                    @auth
                        <div class="dropdown-divider" style="margin: 8px 0; border-top: 1px solid rgba(59, 130, 246, 0.2);"></div>
                        <a class="dropdown-item" href="/my-profile" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                            <i class="fas fa-id-card" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="/tambahmahasiswa" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                            <i class="fas fa-plus-circle" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Tambah Mahasiswa
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger" style="padding: 12px 20px; font-weight: 600; color: #EF4444; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease; width: 100%; text-align: left; background: transparent; border: none;" onmouseover="this.style.background='linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(248, 113, 113, 0.1))'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.transform='translateX(0)'">
                                <i class="fas fa-sign-out-alt" style="width: 20px; color: #EF4444; margin-right: 10px;"></i> Logout
                            </button>
                        </form>
                    @else
                        <div class="dropdown-divider" style="margin: 8px 0; border-top: 1px solid rgba(59, 130, 246, 0.2);"></div>
                        <a class="dropdown-item" href="{{ route('login') }}" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                            <i class="fas fa-sign-in-alt" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Login
                        </a>
                        <a class="dropdown-item" href="{{ route('register') }}" style="padding: 12px 20px; font-weight: 600; color: #1F2937; border-radius: 10px; margin: 5px 8px; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(96, 165, 250, 0.1))'; this.style.color='#3B82F6'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.color='#1F2937'; this.style.transform='translateX(0)'">
                            <i class="fas fa-user-plus" style="width: 20px; color: #60A5FA; margin-right: 10px;"></i> Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">&copy; 2026 Suci Nento - Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>