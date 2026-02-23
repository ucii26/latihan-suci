@extends('layouts.main')

@section('content')
<section class="hero-section">
	<div class="container">
		<h1 style="font-size: 3rem;">Selamat Datang di WEBSITE SUCI</h1>
		<p style="font-size: 1.3rem; margin-bottom: 30px;">Platform berita, informasi dan manajemen database.</p>
		<div class="hero-ctas">
			<a href="/datamahasiswa" class="btn btn-primary btn-lg mr-2">
				<i class="fas fa-users"></i> Lihat Data Mahasiswa
			</a>
			<a href="/tambahmahasiswa" class="btn btn-secondary btn-lg">
				<i class="fas fa-plus-circle"></i> Tambah Mahasiswa Baru
			</a>
		</div>
	</div>
</section>

<section class="py-5">
	<div class="container">
		<h2 class="section-title">Fitur Utama</h2>
		<div class="row">
			<div class="col-md-4 mb-4 fade-in">
				<div class="card h-100 text-center">
					<div class="card-body">
						<div style="font-size: 3rem; margin-bottom: 15px;">📰</div>
						<h5 class="card-title" style="color: #6B4423;">Berita & Informasi</h5>
						<p class="card-text">Dapatkan informasi terbaru dan berita-berita menarik.</p>
						<a href="/berita" class="btn btn-primary btn-sm">
							<i class="fas fa-arrow-right"></i> Lihat Berita
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 mb-4 fade-in">
				<div class="card h-100 text-center">
					<div class="card-body">
						<div style="font-size: 3rem; margin-bottom: 15px;">📞</div>
						<h5 class="card-title" style="color: #6B4423;">Hubungi Kami</h5>
						<p class="card-text">Ada pertanyaan atau masukan? Jangan ragu untuk menghubungi kami.</p>
						<a href="/contact" class="btn btn-primary btn-sm">
							<i class="fas fa-arrow-right"></i> Hubungi Kami
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 mb-4 fade-in">
				<div class="card h-100 text-center">
					<div class="card-body">
						<div style="font-size: 3rem; margin-bottom: 15px;">ℹ️</div>
						<h5 class="card-title" style="color: #6B4423;">Tentang Kami</h5>
						<p class="card-text">Pelajari lebih lanjut tentang platform kami, visi, dan misi.</p>
						<a href="{{ route('about') }}" class="btn btn-primary btn-sm">
							<i class="fas fa-arrow-right"></i> Pelajari Lebih
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section style="background: linear-gradient(135deg, rgba(107, 68, 35, 0.05) 0%, rgba(232, 220, 200, 0.1) 100%); padding: 60px 0; margin-top: 40px;">
	<div class="container">
		<h2 class="section-title">Keunggulan Kami</h2>
		<div class="row text-center">
			<div class="col-md-4 mb-4 fade-in">
				<div class="icon-box" style="width: 80px; height: 80px; font-size: 2.5rem; margin-left: auto; margin-right: auto;">
					<i class="fas fa-rocket"></i>
				</div>
				<h4 style="color: #6B4423; font-weight: 700; margin-bottom: 10px; margin-top: 15px;">Cepat & Responsif</h4>
				<p style="color: #8B6F47;">Website yang super cepat dan responsif di semua perangkat</p>
			</div>
			<div class="col-md-4 mb-4 fade-in">
				<div class="icon-box" style="width: 80px; height: 80px; font-size: 2.5rem; margin-left: auto; margin-right: auto;">
					<i class="fas fa-shield-alt"></i>
				</div>
				<h4 style="color: #6B4423; font-weight: 700; margin-bottom: 10px; margin-top: 15px;">Aman & Terpercaya</h4>
				<p style="color: #8B6F47;">Data Anda aman dengan enkripsi dan sistem keamanan terbaik</p>
			</div>
			<div class="col-md-4 mb-4 fade-in">
				<div class="icon-box" style="width: 80px; height: 80px; font-size: 2.5rem; margin-left: auto; margin-right: auto;">
					<i class="fas fa-heart"></i>
				</div>
				<h4 style="color: #6B4423; font-weight: 700; margin-bottom: 10px; margin-top: 15px;">User Friendly</h4>
				<p style="color: #8B6F47;">Interface yang mudah digunakan untuk semua kalangan</p>
			</div>
		</div>
	</div>
</section>

@endsection