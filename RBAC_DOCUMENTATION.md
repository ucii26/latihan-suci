# 🔐 Role-Based Access Control (RBAC) - Dokumentasi Lengkap

## 📋 Ringkasan Fitur

Sistem registrasi dan role-based access control telah diimplementasikan untuk membedakan antara **user biasa** dan **admin**. Hanya admin yang dapat menambah, mengedit, dan menghapus data mahasiswa.

---

## 👥 Jenis Role

### 1. **User (Pengguna Biasa)**
- Dapat mendaftar akun sendiri melalui halaman `/register`
- Dapat melihat data mahasiswa (`/datamahasiswa`)
- Dapat melihat detail mahasiswa individual
- **TIDAK** dapat menambah, mengedit, atau menghapus data mahasiswa
- Hanya dapat mengakses profile mereka sendiri

### 2. **Admin**
- Dibuat melalui halaman `/admin-setup` (hanya tersedia jika belum ada admin)
- Dapat melakukan semua operasi CRUD (Create, Read, Update, Delete) pada data mahasiswa
- Dapat melihat menu "Tambah Mahasiswa" di navbar
- Akses penuh ke sistem aplikasi

---

## 🚀 Cara Menggunakan

### **Langkah 1: Setup Admin Pertama Kali**

1. Buka aplikasi di browser
2. Navigasi ke `/admin-setup`
3. Isi form dengan:
   - Nama lengkap
   - Email
   - Password (minimal 8 karakter)
   - Konfirmasi password
4. Klik tombol "Buat Admin"
5. Admin berhasil dibuat! Login dengan akun admin

### **Langkah 2: User Biasa Mendaftar**

1. Buka halaman `/register`
2. Isi form registrasi:
   - Nama lengkap
   - Email
   - Password
   - Konfirmasi password
3. Klik "Daftar"
4. Redirect ke login
5. Login dengan akun baru Anda

### **Langkah 3: Login dan Cek Role**

Setelah login:
- **User biasa**: Navbar hanya menampilkan menu standar
- **Admin**: Navbar menampilkan menu "Tambah Mahasiswa" di dropdown profile

---

## 📁 File-File yang Dimodifikasi/Dibuat

### **Migrations**
- `database/migrations/2025_01_21_000001_add_role_to_users_table.php`
  - Menambahkan kolom `role` (enum: 'user', 'admin') ke tabel users

### **Models**
- `app/Models/User.php`
  - Update `$fillable` untuk include kolom `role`

### **Controllers**
- `app/Http/Controllers/Auth/RegisterController.php`
  - Update: Set default `role = 'user'` saat registrasi

- `app/Http/Controllers/Auth/AdminSetupController.php` (BARU)
  - Mengelola setup admin pertama kali
  - Validasi bahwa admin belum ada sebelum membuat yang baru

### **Middleware**
- `app/Http/Middleware/CheckAdmin.php` (BARU)
  - Middleware untuk mengecek apakah user adalah admin
  - Return 403 Forbidden jika bukan admin

- `app/Http/Kernel.php`
  - Register middleware alias `'admin'` ke `CheckAdmin::class`

### **Routes**
- `routes/web.php`
  - Update: Routes `/tambahmahasiswa`, `/insertdata`, `/editdata/{id}`, `/delete/{id}` sekarang menggunakan middleware `'admin'`
  - Tambah: Routes `/admin-setup` untuk setup admin pertama kali

### **Views**
- `resources/views/layouts/main.blade.php`
  - Update: Ganti `Auth::user()->email === 'admin@example.com'` dengan `Auth::user()->role === 'admin'`
  - Berlaku di desktop navbar dan mobile menu

- `resources/views/admin-setup.blade.php` (BARU)
  - Form untuk setup admin pertama kali
  - Validasi form client-side dan server-side

---

## 🔒 Keamanan

### **Middleware Protection**
```php
Route::middleware('auth', 'admin')->group(function () {
    // Hanya admin yang dapat akses routes ini
    Route::get('/tambahmahasiswa', ...);
    Route::post('/insertdata', ...);
    Route::post('/editdata/{id}', ...);
    Route::get('/delete/{id}', ...);
});
```

### **View Protection**
```php
@if(Auth::user()->role === 'admin')
    <!-- Tampilkan menu admin -->
@endif
```

### **Frontend Protection**
- Menu "Tambah Mahasiswa" tidak muncul untuk user biasa
- Halaman tidak accessible meskipun user tahu URL-nya

---

## 📊 Database Schema

### **Users Table (Baru)**
```
Column    | Type      | Constraint
----------|-----------|---------------------------
id        | BIGINT    | PRIMARY KEY, AUTO_INCREMENT
name      | VARCHAR   | NOT NULL
email     | VARCHAR   | NOT NULL, UNIQUE
password  | VARCHAR   | NOT NULL
role      | ENUM      | NOT NULL, DEFAULT 'user'
created_at| TIMESTAMP | DEFAULT CURRENT_TIMESTAMP
updated_at| TIMESTAMP | DEFAULT CURRENT_TIMESTAMP
```

**Enum Values untuk `role`:**
- `'user'` - Pengguna biasa
- `'admin'` - Administrator

---

## 🧪 Testing

### **Test 1: Setup Admin**
```
1. Buka http://localhost:8000/admin-setup
2. Isi form dengan data admin
3. Klik "Buat Admin"
4. Cek di browser redirect ke login dengan pesan sukses
```

### **Test 2: Admin Melihat Menu Admin**
```
1. Login dengan akun admin
2. Di navbar, dropdown profile harus menampilkan "Tambah Mahasiswa"
3. Di mobile, geser menu mobile harus ada "Tambah Mahasiswa"
4. Klik "Tambah Mahasiswa" → Berhasil buka halaman form
```

### **Test 3: User Biasa Tidak Melihat Menu Admin**
```
1. Register akun user biasa
2. Login dengan akun user biasa
3. Di navbar, dropdown profile TIDAK ada "Tambah Mahasiswa"
4. Coba akses /tambahmahasiswa → Error 403 Forbidden
```

### **Test 4: User Biasa Akses Protected Routes**
```
1. Login sebagai user biasa
2. Coba akses:
   - /tambahmahasiswa → Error 403
   - /insertdata (POST) → Error 403
   - /editdata/{id} (POST) → Error 403
   - /delete/{id} → Error 403
3. Hanya admin yang bisa akses semua routes ini
```

---

## 🛠️ Database Migration

Untuk menjalankan migration dan menambahkan kolom `role` ke tabel users:

```bash
php artisan migrate
```

**Output yang diharapkan:**
```
Migrating: 2025_01_21_000001_add_role_to_users_table
Migrated:  2025_01_21_000001_add_role_to_users_table (0.12s)
```

### **Jika perlu rollback:**
```bash
php artisan migrate:rollback
```

---

## 📝 Checklist Implementasi

- ✅ Migration membuat kolom `role` di tabel users
- ✅ User model include `role` di `$fillable`
- ✅ RegisterController set `role = 'user'` saat registrasi publik
- ✅ AdminSetupController membuat user dengan `role = 'admin'`
- ✅ CheckAdmin middleware verify user adalah admin
- ✅ Middleware teregister di Kernel.php
- ✅ Routes dilindungi dengan middleware `'admin'`
- ✅ Main navbar update untuk cek `role` bukan email
- ✅ Admin setup page dibuat
- ✅ Dokumentasi lengkap

---

## 🚨 Troubleshooting

### **Error: "Hanya admin yang dapat mengakses halaman ini"**
- User Anda tidak memiliki role `'admin'`
- Solusi: Login dengan akun admin atau setup admin baru

### **Admin setup page tidak ditemukan**
- Pastikan file controller ada: `app/Http/Controllers/Auth/AdminSetupController.php`
- Pastikan routes terdaftar di `routes/web.php`
- Run: `php artisan route:list`

### **Role tidak berubah di database**
- Pastikan migration sudah dijalankan: `php artisan migrate`
- Check dengan: `php artisan tinker` → `User::all();`

### **Middleware error "Class not found"**
- Pastikan file middleware ada: `app/Http/Middleware/CheckAdmin.php`
- Middleware sudah teregister di `app/Http/Kernel.php`
- Run: `php artisan make:middleware CheckAdmin` jika perlu

---

## 📞 Support

Jika ada pertanyaan atau masalah dengan implementasi RBAC, silakan periksa:
1. Routes di `routes/web.php`
2. Middleware di `app/Http/Kernel.php`
3. Controller logic di `app/Http/Controllers/Auth/`
4. Database structure dengan `php artisan tinker`
