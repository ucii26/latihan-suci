@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); padding: 70px 0; color: white; text-align: center; margin-bottom: 50px;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.1); color: #1E3A8A;">
            <i class="fas fa-edit"></i> Edit Tentang Kami
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.85; color: #475569;">Perbarui informasi tentang institusi kami</p>
    </div>
</div>

<section style="padding: 60px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); padding: 50px; border-top: 5px solid #3B82F6;">
          
          @if($errors->any())
            <div style="background: #FEE2E2; border-left: 5px solid #DC2626; border-radius: 10px; padding: 20px; margin-bottom: 30px; color: #7F1D1D;">
              <strong style="color: #7F1D1D; font-size: 1.1rem;"><i class="fas fa-exclamation-triangle"></i> Validasi Gagal!</strong>
              <ul style="margin-bottom: 0; margin-top: 15px; color: #7F1D1D; line-height: 1.8; padding-left: 20px;">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('tentang-kami.update', $tentangKami->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 25px;">
              <label for="judul" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Judul</label>
              <input type="text" name="judul" id="judul" value="{{ old('judul', $tentangKami->judul) }}" 
                     placeholder="Masukkan judul tentang kami" 
                     style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; transition: all 0.3s ease;"
                     onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                     onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'" required>
            </div>

            <div style="margin-bottom: 30px;">
              <label for="konten" style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Konten</label>
              <textarea name="konten" id="konten" 
                        placeholder="Masukkan konten tentang kami" 
                        rows="10"
                        style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; transition: all 0.3s ease; font-family: Arial, sans-serif; resize: vertical;"
                        onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(30, 58, 138, 0.1)'"
                        onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'" required>{{ old('konten', $tentangKami->konten) }}</textarea>
            </div>

            <div style="display: flex; gap: 15px; justify-content: center;">
              <button type="submit" style="background: #3B82F6; color: white; border: none; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <i class="fas fa-save"></i> Perbarui
              </button>
              <a href="{{ route('tentang-kami.index') }}" style="background: white; color: #555; border: 2px solid #E5E7EB; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; text-align: center; text-decoration: none;" onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.boxShadow='0 5px 20px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.backgroundColor='white'; this.style.boxShadow='none'">
                <i class="fas fa-arrow-left"></i> Batal
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
