# 🎯 LANGKAH-LANGKAH SEDERHANA UNTUK MEMULAI

**Bagi Pemula:** Ikuti langkah-langkah ini untuk mulai menggunakan fitur registrasi dan lupa password.

---

## 📋 STEP 1: Persiapan (Hanya sekali saja)

### A. Buka Command Prompt/PowerShell

```
Tekan: Windows + R
Ketik: cmd
Tekan: Enter
```

### B. Navigasi ke folder project

```bash
cd c:\laragon\www\Divp
```

### C. Jalankan database migration

```bash
php artisan migrate
```

**Output yang diharapkan:**
```
Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
...
```

---

## 🚀 STEP 2: Menjalankan Aplikasi

### A. Buka Terminal Baru

```bash
cd c:\laragon\www\Divp
php artisan serve
```

**Output yang diharapkan:**
```
Laravel development server started on [http://127.0.0.1:8000]
```

### B. Buka Browser

```
http://localhost:8000
```

Sekarang aplikasi sudah running! 🎉

---

## ✅ STEP 3: Testing Fitur Registrasi

### A. Akses Form Registrasi

Buka di browser:
```
http://localhost:8000/register
```

### B. Isi Form

- **Nama Lengkap:** Budi Santoso
- **Email:** budi@example.com
- **Password:** password123 (minimal 8 karakter)
- **Konfirmasi Password:** password123

### C. Klik "Buat Akun"

Jika berhasil:
- ✅ Redirect ke halaman login
- ✅ Muncul pesan "Registrasi berhasil!"

---

## 🔐 STEP 4: Testing Login dengan Akun Baru

### A. Di halaman login

```
http://localhost:8000/login
```

### B. Isi Email & Password

- **Email:** budi@example.com
- **Password:** password123

### C. Klik "Login"

Jika berhasil:
- ✅ Redirect ke halaman home
- ✅ Anda sudah login!

---

## 📊 STEP 5: Lihat Database Mahasiswa (Public)

### A. Logout

Klik tombol **Logout** di navbar (atau buka halaman baru incognito)

### B. Akses Database Mahasiswa

Buka di browser (tanpa login):
```
http://localhost:8000/datamahasiswa
```

Apa yang Anda lihat:
- ✅ Daftar semua mahasiswa
- ✅ Tidak ada tombol Edit/Hapus

### C. Klik Salah Satu Mahasiswa

- Lihat detail mahasiswa
- Tombol Edit/Hapus tidak ada (hanya untuk login user)

---

## 🔑 STEP 6: Testing Lupa Password

### A. Akses Form Lupa Password

```
http://localhost:8000/forgot-password
```

### B. Masukkan Email

- **Email:** admin@example.com (atau email yang sudah didaftar)

### C. Klik "Kirim Link Reset Password"

Apa yang terjadi:
- ✅ Muncul pesan "Kami telah mengirimkan email..."
- ✅ Email dikirim ke Mailpit

### D. Cek Email di Mailpit

Buka di browser:
```
http://localhost:8025
```

- Cari email terbaru
- Klik untuk buka
- Lihat tombol "Reset Password"

### E. Klik Reset Link

- Halaman form reset password terbuka
- Isi password baru
- Klik "Reset Password"

### F. Login dengan Password Baru

```
http://localhost:8000/login
```

- Email: admin@example.com
- Password: password_baru_anda
- Klik Login

Jika berhasil:
- ✅ Anda berhasil login dengan password baru!

---

## 🎯 STEP 7: Testing Edit Mahasiswa (Hanya Login)

### A. Login dulu

Login dengan akun yang sudah Anda buat.

### B. Akses Database Mahasiswa

```
http://localhost:8000/datamahasiswa
```

### C. Perhatikan Perbedaan

**Saat Login:**
- ✅ Tombol Edit & Hapus MUNCUL

**Saat Logout:**
- ✅ Tombol Edit & Hapus HILANG

### D. Coba Edit

- Klik tombol Edit
- Ubah data
- Klik Save
- Data berhasil diupdate!

---

## 💡 Tips & Trik

### Password yang Baik
- Minimal 8 karakter
- Contoh: password123, Divp2024!, MuridSaya123

### Email Unik
- Setiap email hanya bisa digunakan 1x
- Jika muncul error "Email sudah terdaftar", gunakan email lain

### Lupa Password
- Link reset hanya berlaku 60 menit
- Jika expired, request reset baru

### Akun Demo (untuk testing)
- **Email:** admin@example.com
- **Password:** password123

---

## 🐛 Jika Ada Masalah

### Masalah: "Connection refused"

**Solusi:**
1. Pastikan MySQL/Laragon running
2. Click "Start All" di Laragon

### Masalah: "Email tidak terkirim"

**Solusi:**
1. Buka Mailpit: http://localhost:8025
2. Cek apakah email ada di Mailpit

### Masalah: "Cannot find database"

**Solusi:**
```bash
php artisan migrate
```

### Masalah: "Page tidak found"

**Solusi:**
1. Pastikan PHP artisan serve running
2. Pastikan URL benar (case-sensitive)

---

## 📚 Dokumentasi Lengkap

Jika ingin tahu lebih detail:

- **Menjalankan:** [RUNNING_GUIDE.md](RUNNING_GUIDE.md)
- **Overview:** [README_UPDATE.md](README_UPDATE.md)
- **Testing:** [TESTING_GUIDE.md](TESTING_GUIDE.md)
- **Teknis:** [AUTHENTICATION.md](AUTHENTICATION.md)

---

## ✅ Checklist Anda Berhasil

- [ ] Migration sudah di-run
- [ ] PHP artisan serve running
- [ ] Bisa akses http://localhost:8000
- [ ] Registrasi akun baru berhasil
- [ ] Login dengan akun baru berhasil
- [ ] Lihat mahasiswa (public) berhasil
- [ ] Lupa password & reset berhasil
- [ ] Edit mahasiswa (login) berhasil
- [ ] Logout berhasil
- [ ] Semua fitur working! 🎉

---

## 🎉 Selamat!

Anda sudah berhasil:
- ✅ Menjalankan aplikasi
- ✅ Testing registrasi
- ✅ Testing login
- ✅ Testing lupa password
- ✅ Testing edit mahasiswa
- ✅ Memahami fitur-fitur baru

**Aplikasi Divp sudah siap digunakan!**

---

## 📞 Bantuan Lebih Lanjut

- Baca dokumentasi di folder project
- Check file `.md` untuk penjelasan detail
- Lihat console terminal untuk error messages

---

**Selamat! Anda sudah mahir menggunakan fitur-fitur baru! 🚀**

*Ditulis: January 2026*
