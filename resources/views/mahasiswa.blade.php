@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 style="font-size: 3.2rem;">
            <i class="fas fa-users"></i> Data Mahasiswa
        </h1>
        <p style="font-size: 1.1rem;">Kelola dan pantau informasi mahasiswa dengan mudah</p>
    </div>
</div>

<section class="py-5">
  <div class="container">
    <!-- Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
        <div style="flex: 1; min-width: 250px;">
            <input type="text" class="form-control" placeholder="🔍 Cari nama atau NIM..." style="border: 2px solid #3B82F6; border-radius: 10px; padding: 12px 16px; font-size: 1rem; background: white; transition: all 0.3s ease;" onfocus="this.style.borderColor='#1E3A8A'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.2)'" onblur="this.style.borderColor='#3B82F6'; this.style.boxShadow='none'">
        </div>
        <a href="/tambahmahasiswa" class="btn btn-primary" style="padding: 12px 30px; border-radius: 10px; transition: all 0.3s ease; background: #3B82F6; color: white; border: none;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(59, 130, 246, 0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
            <i class="fas fa-plus-circle"></i> Tambah Data Baru
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3 fade-in">
            <div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), rgba(37, 99, 235, 0.08)); border-radius: 15px; padding: 25px; text-align: center; border-left: 5px solid #3B82F6; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(59, 130, 246, 0.15)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="font-size: 2.5rem; font-weight: 900; background: linear-gradient(135deg, #1E3A8A, #3B82F6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ count($data) }}</div>
                <p style="color: #1E3A8A; margin: 10px 0 0 0; font-weight: 700;">Total Mahasiswa</p>
            </div>
        </div>
        <div class="col-md-4 mb-3 fade-in">
            <div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), rgba(96, 165, 250, 0.08)); border-radius: 15px; padding: 25px; text-align: center; border-left: 5px solid #60A5FA; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(96, 165, 250, 0.15)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="font-size: 2.5rem; font-weight: 900; background: linear-gradient(135deg, #3B82F6, #60A5FA); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $data->pluck('prodi')->unique()->count() }}</div>
                <p style="color: #1E3A8A; margin: 10px 0 0 0; font-weight: 700;">Program Studi</p>
            </div>
        </div>
        <div class="col-md-4 mb-3 fade-in">
            <div style="background: linear-gradient(135deg, rgba(147, 197, 253, 0.08), rgba(191, 219, 254, 0.08)); border-radius: 15px; padding: 25px; text-align: center; border-left: 5px solid #93C5FD; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(147, 197, 253, 0.15)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <div style="font-size: 2.5rem; font-weight: 900; background: linear-gradient(135deg, #60A5FA, #93C5FD); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">✓</div>
                <p style="color: #1E3A8A; margin: 10px 0 0 0; font-weight: 700;">Data Aktif</p>
            </div>
        </div>
    </div>

    <!-- Modern Table -->
    <div style="background: white; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); overflow: hidden; border: 2px solid rgba(59, 130, 246, 0.1);">
      <div class="table-responsive">
        <table class="table mb-0" style="border-collapse: collapse;">
          <thead style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); color: white;">
            <tr>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">#</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">Nama</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">NIM</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">Program Studi</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">Email</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none;">No. HP</th>
              <th scope="col" style="padding: 20px; font-weight: 800; border: none; text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1 ?>
            @foreach ($data as $mahasiswa)
            <tr style="border-bottom: 2px solid #E5E7EB; transition: all 0.3s ease;" onmouseover="this.style.background='linear-gradient(90deg, rgba(59, 130, 246, 0.05), rgba(96, 165, 250, 0.05))'; this.style.transform='scale(1.01)'" onmouseout="this.style.background='transparent'; this.style.transform='none'">
                <td style="padding: 16px 20px; font-weight: 700; background: linear-gradient(135deg, #1E3A8A, #3B82F6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $i }}</td>
                <td style="padding: 16px 20px; color: #2d3436; font-weight: 600;">{{ $mahasiswa["name"] }}</td>
                <td style="padding: 16px 20px; color: #6B4423; font-weight: 500;">{{ $mahasiswa["nim"] }}</td>
                <td style="padding: 16px 20px; color: #555;"><span style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(96, 165, 250, 0.15)); color: #1E3A8A; padding: 8px 14px; border-radius: 20px; font-size: 0.9rem; font-weight: 700;">{{ $mahasiswa["prodi"] }}</span></td>
                <td style="padding: 16px 20px; color: #555; font-size: 0.95rem;">{{ $mahasiswa["email"] }}</td>
                <td style="padding: 16px 20px; color: #555;">{{ $mahasiswa["nohp"] }}</td>
                <td style="padding: 16px 20px; text-align: center;">
                    <a href="tampildata/{{ $mahasiswa['id'] }}" class="btn btn-sm" style="background: #3B82F6; color: white; border: none; padding: 8px 14px; border-radius: 8px; margin-right: 5px; font-weight: 700; transition: all 0.3s ease; text-shadow: 0 1px 2px rgba(0,0,0,0.1);" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(59, 130, 246, 0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-hapus" data-id="{{ $mahasiswa['id'] }}" style="background: #EF4444; color: white; border: none; padding: 8px 14px; border-radius: 8px; font-weight: 700; transition: all 0.3s ease; text-shadow: 0 1px 2px rgba(0,0,0,0.1);" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 20px rgba(239, 68, 68, 0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                      <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php $i++?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnHapus = document.querySelectorAll('.btn-hapus');
    
    btnHapus.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            
            Swal.fire({
                title: "Konfirmasi Hapus",
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#E91E63',
                cancelButtonColor: '#666666'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/delete/' + id;
                }
            });
        });
    });
});
</script>
@endsection