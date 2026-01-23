@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); padding: 70px 0; color: white; text-align: center; margin-bottom: 50px;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.1); color: #1E3A8A;">
            <i class="fas fa-user-graduate"></i> Tambah Data Mahasiswa
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.85; color: #475569;">Daftarkan mahasiswa baru ke dalam sistem</p>
    </div>
</div>

<section style="padding: 60px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); padding: 50px; border-top: 5px solid #3B82F6;">
          
          @if($errors->any())
            <div style="background: #FEE2E2; border-left: 5px solid #DC2626; border-radius: 10px; padding: 20px; margin-bottom: 30px; color: #7F1D1D; box-shadow: 0 4px 15px rgba(220, 38, 38, 0.2);">
              <strong style="color: #7F1D1D; font-size: 1.1rem;"><i class="fas fa-exclamation-triangle"></i> Validasi Gagal!</strong>
              <ul style="margin-bottom: 0; margin-top: 15px; color: #7F1D1D; line-height: 1.8; padding-left: 20px;">
                @foreach($errors->all() as $error)
                  <li style="font-weight: 500;">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="/insertdata" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 25px;">
              <label for="name" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Nama Lengkap</label>
              <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap" 
                     class="form-control @error('name') is-invalid @enderror" 
                     value="{{ old('name') }}" required
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
              @error('name')
                <small style="color: #dc3545; display: block; margin-top: 6px;">{{ $message }}</small>
              @enderror
            </div>

            <div style="margin-bottom: 25px;">
              <label for="nim" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">NIM (Nomor Induk Mahasiswa)</label>
              <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" 
                     class="form-control @error('nim') is-invalid @enderror" 
                     value="{{ old('nim') }}" required
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
              @error('nim')
                <small style="color: #dc3545; display: block; margin-top: 6px;">{{ $message }}</small>
              @enderror
            </div>

            <div style="margin-bottom: 25px;">
              <label for="prodi" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Program Studi</label>
              <input type="text" name="prodi" id="prodi" placeholder="Masukkan program studi" 
                     class="form-control @error('prodi') is-invalid @enderror" 
                     value="{{ old('prodi') }}" required
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
              @error('prodi')
                <small style="color: #dc3545; display: block; margin-top: 6px;">{{ $message }}</small>
              @enderror
            </div>

            <div style="margin-bottom: 25px;">
              <label for="email" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Email</label>
              <input type="email" name="email" id="email" placeholder="Masukkan email" 
                     class="form-control @error('email') is-invalid @enderror" 
                     value="{{ old('email') }}" required
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
              @error('email')
                <small style="color: #dc3545; display: block; margin-top: 6px;">{{ $message }}</small>
              @enderror
            </div>

            <div style="margin-bottom: 30px;">
              <label for="nohp" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Nomor HP</label>
              <input type="tel" name="nohp" id="nohp" placeholder="Masukkan nomor HP" 
                     class="form-control @error('nohp') is-invalid @enderror" 
                     value="{{ old('nohp') }}" required
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
              @error('nohp')
                <small style="color: #dc3545; display: block; margin-top: 6px;">{{ $message }}</small>
              @enderror
            </div>

            <div style="display: flex; gap: 15px; justify-content: center;">
              <button type="submit" class="btn btn-primary" style="background: #3B82F6; border: none; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; color: white;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <i class="fas fa-save"></i> Simpan Data
              </button>
              <a href="/datamahasiswa" class="btn btn-secondary" style="background: #f0f0f0; color: #555; border: none; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; text-align: center;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#f0f0f0'">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection