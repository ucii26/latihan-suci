@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); padding: 70px 0; color: white; text-align: center; margin-bottom: 50px;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.1); color: #1E3A8A;">
            <i class="fas fa-user-circle"></i> Detail Mahasiswa
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.85; color: #475569;">Informasi lengkap mahasiswa</p>
    </div>
</div>

<section style="padding: 60px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); padding: 50px; border-top: 5px solid #3B82F6;">
          
          <div style="margin-bottom: 25px;">
            <label style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Nama Lengkap</label>
            <div style="border: 2px solid #E5E7EB; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; background: #F9FAFB; color: #1F2937; font-weight: 500;">
              {{ $data['name'] }}
            </div>
          </div>

          <div style="margin-bottom: 25px;">
            <label style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">NIM (Nomor Induk Mahasiswa)</label>
            <div style="border: 2px solid #E5E7EB; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; background: #F9FAFB; color: #1F2937; font-weight: 500;">
              {{ $data['nim'] }}
            </div>
          </div>

          <div style="margin-bottom: 25px;">
            <label style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Program Studi</label>
            <div style="border: 2px solid #E5E7EB; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; background: #F9FAFB; color: #1F2937; font-weight: 500;">
              <span style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(96, 165, 250, 0.15)); color: #1E3A8A; padding: 8px 14px; border-radius: 20px; font-size: 0.9rem; font-weight: 700;">{{ $data['prodi'] }}</span>
            </div>
          </div>

          <div style="margin-bottom: 25px;">
            <label style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Email</label>
            <div style="border: 2px solid #E5E7EB; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; background: #F9FAFB; color: #1F2937; font-weight: 500;">
              {{ $data['email'] }}
            </div>
          </div>

          <div style="margin-bottom: 30px;">
            <label style="color: #1E3A8A; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; margin-bottom: 10px; display: block;">Nomor HP</label>
            <div style="border: 2px solid #E5E7EB; border-radius: 10px; padding: 12px 16px; font-size: 1rem; width: 100%; background: #F9FAFB; color: #1F2937; font-weight: 500;">
              {{ $data['nohp'] }}
            </div>
          </div>

          <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="/tampildata/{{ $data['id'] }}" style="background: #3B82F6; color: white; border: none; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; text-align: center; text-decoration: none;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
              <i class="fas fa-edit"></i> Edit Data
            </a>
            <a href="/datamahasiswa" style="background: white; color: #555; border: 2px solid #E5E7EB; padding: 14px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; flex: 1; text-align: center; text-decoration: none;" onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.boxShadow='0 5px 20px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.backgroundColor='white'; this.style.boxShadow='none'">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
