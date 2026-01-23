<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>Detail Berita | Berita Informasi</title>
  <style>
    body {
      background: linear-gradient(135deg, #f5f6fa 0%, #e8eaf0 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar-custom {
      background: linear-gradient(135deg, #E91E63 0%, #FF1493 100%) !important;
      box-shadow: 0 4px 20px rgba(233, 30, 99, 0.2);
    }
    .navbar-custom .nav-link {
      color: white !important;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
    }
    .navbar-custom .nav-link:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: rgba(255, 255, 255, 0.8);
      transition: width 0.3s ease;
    }
    .navbar-custom .nav-link:hover:after {
      width: 100%;
    }
    .hero-section {
      background: linear-gradient(135deg, #E91E63 0%, #FF1493 100%);
      padding: 80px 0;
      color: white;
      text-align: center;
      margin-bottom: 60px;
      text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    .content-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.1);
      padding: 50px;
      margin-bottom: 40px;
      animation: fadeIn 0.8s ease;
    }
    .article-meta {
      display: flex;
      gap: 30px;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 2px solid #e8eaf0;
    }
    .article-meta-item {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #666;
    }
    .article-meta-item i {
      color: #E91E63;
      font-size: 1.2rem;
    }
    .article-image {
      border-radius: 15px;
      overflow: hidden;
      margin-bottom: 40px;
      box-shadow: 0 15px 40px rgba(233, 30, 99, 0.2);
      max-height: 500px;
      object-fit: cover;
      width: 100%;
    }
    .article-content {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #333;
      text-align: justify;
    }
    .back-btn {
      background: linear-gradient(135deg, #E91E63, #FF1493);
      border: none;
      color: white;
      padding: 12px 30px;
      border-radius: 10px;
      font-weight: 700;
      transition: all 0.3s ease;
      display: inline-block;
      text-decoration: none;
    }
    .back-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(233, 30, 99, 0.4);
      color: white;
      text-decoration: none;
    }
    footer {
      background: linear-gradient(135deg, #2d3436 0%, #3d4451 100%);
      color: white;
      text-align: center;
      padding: 30px 0;
      border-top: 3px solid #E91E63;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/" style="font-weight: 700; font-size: 1.5rem;">
        <i class="fas fa-newspaper"></i> Berita Informasi
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="/berita"><i class="fas fa-newspaper"></i> Berita</a></li>
          <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i> Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact"><i class="fas fa-envelope"></i> Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="container">
      <h1 style="font-size: 2.8rem; font-weight: 900; margin-bottom: 10px;"><?php echo $judul; ?></h1>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <div class="content-card">
      <div class="article-meta">
        <div class="article-meta-item">
          <i class="fas fa-calendar-alt"></i>
          <span><?php echo $tanggal; ?></span>
        </div>
        <div class="article-meta-item">
          <i class="fas fa-newspaper"></i>
          <span>Berita</span>
        </div>
      </div>

      <img src="<?php echo $gambar; ?>" class="article-image" alt="<?php echo $judul; ?>">
      
      <div class="article-content">
        <?php echo $isi; ?>
      </div>

      <div style="margin-top: 50px; padding-top: 30px; border-top: 2px solid #e8eaf0;">
        <a href="/berita" class="back-btn">
          <i class="fas fa-arrow-left"></i> Kembali ke Daftar Berita
        </a>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <p style="margin: 0;">&copy; <?php echo date("Y"); ?> TI UNIMUS | Berita Dan Informasi</p>
      <p style="margin: 10px 0 0 0; font-size: 0.9rem; opacity: 0.8;">
        <i class="fas fa-heart" style="color: #E91E63;"></i> Dengan bangga dipersembahkan oleh Tim IT
      </p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>