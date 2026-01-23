# ⚡ Panduan Cepat Setup Role-Based Access Control

## 🎯 Langkah-Langkah Setup (5 Menit)

### **1️⃣ Migration Sudah Dijalankan ✅**
Kolom `role` sudah ditambahkan ke tabel `users`.

```bash
php artisan migrate  # Jika belum dijalankan
```

### **2️⃣ Buat Admin Pertama Kali**

Buka browser dan akses:
```
http://localhost:8000/admin-setup
```

Atau jika menggunakan port lain:
```
http://127.0.0.1:8000/admin-setup
```

**Isi form dengan:**
- Nama: Admin Name
- Email: admin@example.com
- Password: (minimal 8 karakter)
- Konfirmasi Password: (sama dengan password)

Klik **"Buat Admin"** → Redirect ke login ✅

### **3️⃣ Login Sebagai Admin**

Di halaman `/login`:
- Email: `admin@example.com`
- Password: (password yang Anda buat)

Klik **"Login"** ✅

### **4️⃣ Verifikasi Menu Admin Muncul**

Setelah login sebagai admin:
- **Desktop**: Lihat navbar atas kanan → Click nama Anda → Lihat "Tambah Mahasiswa" ✅
- **Mobile**: Click hamburger icon (≡) → Lihat "Tambah Mahasiswa" ✅

### **5️⃣ Testing: Register User Biasa**

Buka `/register` dan buat akun user biasa:
- Nama: User Biasa
- Email: user@example.com
- Password: user12345

Klik **"Daftar"** → Login dengan akun user ✅

**Verifikasi:** User biasa TIDAK melihat "Tambah Mahasiswa" di navbar ✅

---

## 🔑 Perbedaan Akses

| Fitur | User Biasa | Admin |
|-------|-----------|-------|
| Register Akun | ✅ | ✅ |
| Login | ✅ | ✅ |
| Lihat Data Mahasiswa | ✅ | ✅ |
| Tambah Mahasiswa | ❌ | ✅ |
| Edit Mahasiswa | ❌ | ✅ |
| Hapus Mahasiswa | ❌ | ✅ |
| Menu di Navbar | ❌ (Admin) | ✅ (Admin) |

---

## 📍 URL Penting

| URL | Tujuan | Akses |
|-----|--------|-------|
| `/` | Halaman Home | Public |
| `/register` | Daftar Akun User | Public |
| `/login` | Login | Public |
| `/admin-setup` | Setup Admin Pertama | Public (sekali) |
| `/datamahasiswa` | Lihat Data Mahasiswa | Public |
| `/tambahmahasiswa` | Tambah Mahasiswa | Admin Only |
| `/editdata/{id}` | Edit Mahasiswa | Admin Only |
| `/delete/{id}` | Hapus Mahasiswa | Admin Only |

---

## 🧪 Quick Test

**Test 1 - Cek Kolom Role di Database:**
```bash
php artisan tinker
>>> User::first()->role
=> "admin"  // atau "user"
```

**Test 2 - Cek User Admin di Database:**
```bash
php artisan tinker
>>> User::where('role', 'admin')->get()
=> [ koleksi users dengan role admin ]
```

**Test 3 - Cek User Biasa di Database:**
```bash
php artisan tinker
>>> User::where('role', 'user')->get()
=> [ koleksi users dengan role user ]
```

---

## 🚀 Fitur Baru

✅ **Admin Setup Page** (`/admin-setup`)
- Hanya bisa diakses jika belum ada admin
- Form validasi lengkap
- Redirect ke login setelah berhasil

✅ **Role-Based Authorization**
- Middleware `admin` melindungi admin routes
- Cek di navbar menggunakan `Auth::user()->role`
- Auto-hide menu admin untuk user biasa

✅ **Database Role Column**
- Kolom `role` enum: 'user' atau 'admin'
- Default 'user' untuk setiap registrasi baru
- Migrasi: `2025_01_21_000001_add_role_to_users_table`

---

## ✅ Semua Setup Done!

Sistem role-based access control sudah siap digunakan.

**Next Step:**
1. Run `php artisan migrate` jika belum
2. Buka `/admin-setup` buat admin pertama
3. Login dan test fitur admin
4. Register user biasa dan verifikasi aksesnya

Dokumentasi lengkap ada di: `RBAC_DOCUMENTATION.md`
