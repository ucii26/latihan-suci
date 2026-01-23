@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <!-- Main Content Card -->
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #DCFCE7; border: 1px solid #86EFAC; color: #166534; border-radius: 10px;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Profile Card -->
            <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
                <!-- Header -->
                <div style="background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 100%); padding: 40px 30px; color: white;">
                    <div style="display: flex; align-items: center; gap: 20px;">
                        <div style="width: 80px; height: 80px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                            <i class="fas fa-user fa-3x" style="color: #3B82F6;"></i>
                        </div>
                        <div>
                            <h2 style="margin: 0; font-weight: 800; font-size: 1.8rem;">{{ Auth::user()->name }}</h2>
                            <p style="margin: 5px 0 0 0; opacity: 0.9; font-size: 0.95rem;">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div style="padding: 40px 30px; background: white;">
                    <!-- Info Grid -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; margin-bottom: 40px;">
                        <!-- Role -->
                        <div style="padding: 20px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(96, 165, 250, 0.05)); border-radius: 12px; border-left: 4px solid #3B82F6;">
                            <p style="color: #64748B; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">Role Akun</p>
                            <span class="badge" style="background: @if(Auth::user()->role === 'admin') linear-gradient(135deg, #EF4444, #F87171) @else linear-gradient(135deg, #3B82F6, #60A5FA) @endif; color: white; padding: 8px 14px; font-size: 0.95rem; border-radius: 8px; font-weight: 700;">
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </div>

                        <!-- Status -->
                        <div style="padding: 20px; background: linear-gradient(135deg, rgba(34, 197, 94, 0.05), rgba(86, 180, 137, 0.05)); border-radius: 12px; border-left: 4px solid #22C55E;">
                            <p style="color: #64748B; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">Status Akun</p>
                            <span class="badge" style="background: linear-gradient(135deg, #22C55E, #4ADE80); color: white; padding: 8px 14px; font-size: 0.95rem; border-radius: 8px; font-weight: 700;">
                                Aktif
                            </span>
                        </div>

                        <!-- ID User -->
                        <div style="padding: 20px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.05), rgba(196, 181, 253, 0.05)); border-radius: 12px; border-left: 4px solid #A855F7;">
                            <p style="color: #64748B; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">ID User</p>
                            <p style="margin: 0; color: #1F2937; font-weight: 700; font-size: 1.1rem;">#{{ Auth::user()->id }}</p>
                        </div>
                    </div>

                    <hr style="border: none; border-top: 1px solid #E5E7EB; margin: 30px 0;">

                    <!-- Additional Info -->
                    <div style="margin-bottom: 30px;">
                        <p style="color: #64748B; font-size: 0.9rem; margin-bottom: 12px;"><strong>Terdaftar:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                        <p style="color: #64748B; font-size: 0.9rem; margin: 0;"><strong>Terakhir Update:</strong> {{ Auth::user()->updated_at->format('d M Y H:i') }}</p>
                    </div>

                    <hr style="border: none; border-top: 1px solid #E5E7EB; margin: 30px 0;">

                    <!-- Actions -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                        <a href="/edit-profile" class="btn btn-primary" style="background: #3B82F6; color: white; border: none; padding: 12px 20px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block; text-align: center;" onmouseover="this.style.background='#1E3A8A'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(59, 130, 246, 0.3)'" onmouseout="this.style.background='#3B82F6'; this.style.transform='none'; this.style.boxShadow='none'">
                            Edit Profil
                        </a>
                        <a href="/datamahasiswa" class="btn btn-info" style="background: #06B6D4; color: white; border: none; padding: 12px 20px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block; text-align: center;" onmouseover="this.style.background='#0891B2'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(6, 182, 212, 0.3)'" onmouseout="this.style.background='#06B6D4'; this.style.transform='none'; this.style.boxShadow='none'">
                            Data Mahasiswa
                        </a>
                        @if(Auth::user()->role === 'admin' || true)
                            <a href="/tambahmahasiswa" class="btn btn-success" style="background: #22C55E; color: white; border: none; padding: 12px 20px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block; text-align: center;" onmouseover="this.style.background='#16A34A'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(34, 197, 94, 0.3)'" onmouseout="this.style.background='#22C55E'; this.style.transform='none'; this.style.boxShadow='none'">
                                Tambah Mahasiswa
                            </a>
                        @endif
                        <a href="/" class="btn btn-secondary" style="background: #6B7280; color: white; border: none; padding: 12px 20px; font-weight: 700; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; display: inline-block; text-align: center;" onmouseover="this.style.background='#4B5563'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(107, 114, 128, 0.3)'" onmouseout="this.style.background='#6B7280'; this.style.transform='none'; this.style.boxShadow='none'">
                            Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
