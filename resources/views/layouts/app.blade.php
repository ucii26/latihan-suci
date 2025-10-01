<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'MySite')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('css')
</head>
<body>

  <!-- HEADER -->
  <header class="site-header">
    <div class="container header-inner">
      <h1 class="logo"><a href="{{ url('/home') }}">MySite</a></h1>
      <nav class="site-nav">
        <ul>
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li><a href="{{ url('/berita') }}">Berita</a></li>
          <li><a href="{{ url('/profile') }}">Profile</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <div class="main-content">
    @yield('content')
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="container footer-inner">
      <p>© {{ date('Y') }} MySite. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
  @stack('js')
</body>
</html>