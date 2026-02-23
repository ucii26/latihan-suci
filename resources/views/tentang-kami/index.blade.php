@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #E8F1F8 0%, #D0E4F2 100%); padding: 70px 0; color: white; text-align: center; margin-bottom: 50px;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.1); color: #1E3A8A;">
            <i class="fas fa-info-circle"></i> Tentang Kami
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.85; color: #475569;">Kelola informasi tentang institusi kami</p>
    </div>
</div>

<section style="padding: 60px 0;">
  <div class="container">
    @if(session('success'))
        <div style="background: #D1FAE5; border-left: 5px solid #10B981; border-radius: 10px; padding: 20px; margin-bottom: 30px; color: #065F46;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div style="background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); padding: 40px; border-top: 5px solid #3B82F6;">
          
          @if($tentangKami)
            <!-- Display existing content -->
            <div style="margin-bottom: 30px;">
              <h2 style="color: #1E3A8A; font-weight: 900; margin-bottom: 20px; font-size: 2rem;">{{ $tentangKami->judul }}</h2>
              <div style="color: #475569; line-height: 1.8; font-size: 1.05rem; text-align: justify;">
                {!! nl2br(e($tentangKami->konten)) !!}
              </div>
            </div>

            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
              <a href="{{ route('tentang-kami.edit', $tentangKami->id) }}" style="background: #3B82F6; color: white; border: none; padding: 12px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <i class="fas fa-edit"></i> Edit
              </a>
              <form action="{{ route('tentang-kami.destroy', $tentangKami->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete()" style="background: #EF4444; color: white; border: none; padding: 12px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(239, 68, 68, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                  <i class="fas fa-trash"></i> Hapus
                </button>
              </form>
            </div>

            <script>
              function confirmDelete() {
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
                    document.querySelector('form').submit();
                  }
                });
              }
            </script>
          @else
            <!-- No content yet -->
            <div style="text-align: center; padding: 50px 0;">
              <i class="fas fa-folder-open" style="font-size: 4rem; color: #CBD5E1; margin-bottom: 20px;"></i>
              <h3 style="color: #64748B; margin-bottom: 20px;">Belum Ada Data Tentang Kami</h3>
              <p style="color: #94A3B8; margin-bottom: 30px;">Silakan buat data tentang kami terlebih dahulu</p>
              <a href="{{ route('tentang-kami.create') }}" style="background: #3B82F6; color: white; padding: 12px 30px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                <i class="fas fa-plus-circle"></i> Tambah Data
              </a>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
