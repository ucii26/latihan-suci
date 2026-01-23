# Fitur Autentikasi dan Registrasi

Dokumentasi lengkap untuk fitur registrasi akun, lupa password, dan akses publik database mahasiswa.

## Fitur yang Ditambahkan

### 1. Registrasi Akun (Register)
- **URL**: `/register`
- **View**: `resources/views/register.blade.php`
- **Controller**: `app/Http/Controllers/Auth/RegisterController.php`
- **Fitur**:
  - Form registrasi dengan validasi lengkap
  - Password harus minimal 8 karakter
  - Konfirmasi password
  - Validasi email unique (tidak boleh duplikat)
  - Toggle password visibility
  - Error message yang informatif

### 2. Lupa Password (Forgot Password & Reset)
- **URL Lupa Password**: `/forgot-password`
- **URL Reset**: `/reset-password/{token}`
- **Views**: 
  - `resources/views/auth/forgot-password.blade.php`
  - `resources/views/auth/reset-password.blade.php`
- **Controller**: `app/Http/Controllers/Auth/ForgotPasswordController.php`
- **Fitur**:
  - Form input email untuk meminta link reset
  - Link reset password dikirim via email
  - Token reset password expire dalam 60 menit
  - Validasi password baru dengan konfirmasi
  - Password harus minimal 8 karakter

### 3. Database Mahasiswa Publik
- **URL**: `/datamahasiswa` dan `/tampildata/{id}`
- **Akses**: Publik (tidak perlu login)
- **Fitur**:
  - Siapa saja bisa melihat daftar mahasiswa
  - Siapa saja bisa melihat detail mahasiswa
  - **Tambah/Edit/Hapus**: Hanya untuk user yang sudah login

## Routes

### Public Routes
```
GET  /register                    - Tampilkan form registrasi
POST /register                    - Proses registrasi
GET  /forgot-password             - Tampilkan form lupa password
POST /forgot-password             - Kirim link reset password
GET  /reset-password/{token}      - Tampilkan form reset password
POST /reset-password              - Proses reset password
GET  /datamahasiswa               - Lihat daftar mahasiswa (publik)
GET  /tampildata/{id}             - Lihat detail mahasiswa (publik)
```

### Protected Routes (Hanya Login)
```
GET  /tambahmahasiswa             - Form tambah mahasiswa
POST /insertdata                  - Simpan mahasiswa baru
POST /editdata/{id}               - Update mahasiswa
GET  /delete/{id}                 - Hapus mahasiswa
```

## File yang Ditambahkan/Dimodifikasi

### File Baru:
1. `app/Http/Controllers/Auth/RegisterController.php` - Controller registrasi
2. `app/Http/Controllers/Auth/ForgotPasswordController.php` - Controller password reset
3. `app/Notifications/ResetPassword.php` - Notifikasi email reset password
4. `resources/views/register.blade.php` - View registrasi
5. `resources/views/auth/forgot-password.blade.php` - View lupa password
6. `resources/views/auth/reset-password.blade.php` - View reset password
7. `resources/views/emails/reset-password.blade.php` - Template email reset

### File Dimodifikasi:
1. `routes/web.php` - Tambah routes registrasi, forgot password, dan ubah akses mahasiswa
2. `resources/views/login.blade.php` - Tambah link registrasi dan lupa password
3. `app/Models/User.php` - Tambah method sendPasswordResetNotification()

## Konfigurasi Email (PENTING)

Untuk fitur reset password bekerja, pastikan konfigurasi email di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit          # atau smtp.gmail.com, dll
MAIL_PORT=1025             # atau 587, dll
MAIL_USERNAME=null         # Email address
MAIL_PASSWORD=null         # Password
MAIL_ENCRYPTION=null       # null, tls, atau ssl
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Testing Lokal dengan Mailpit:
1. Mailpit sudah berjalan di `http://localhost:8025` (default di Laragon)
2. Email reset akan ditampilkan di Mailpit UI
3. Copy link dari email ke browser untuk test reset password

## Alur Penggunaan

### 1. Registrasi Akun Baru
```
1. User klik "Daftar di sini" di halaman login
2. Isi form dengan nama, email, password
3. Klik "Buat Akun"
4. Berhasil, redirect ke halaman login
5. Login dengan email dan password yang baru didaftar
```

### 2. Lupa Password
```
1. User klik "Lupa password?" di halaman login
2. Masukkan email yang terdaftar
3. Klik "Kirim Link Reset Password"
4. Cek email (atau Mailpit untuk testing)
5. Klik link di email
6. Masukkan password baru dan konfirmasi
7. Klik "Reset Password"
8. Berhasil, redirect ke login
9. Login dengan password baru
```

### 3. Lihat Database Mahasiswa (Publik)
```
1. User (publik/tidak login) bisa akses /datamahasiswa
2. Lihat daftar semua mahasiswa
3. Klik nama/detail untuk melihat detail mahasiswa
4. Tombol Tambah/Edit/Hapus hanya muncul jika login
```

## Validasi Form

### Registrasi
- **Nama**: Wajib diisi, string
- **Email**: Wajib diisi, valid email, unique
- **Password**: Wajib diisi, min 8 karakter, harus sesuai konfirmasi

### Lupa Password
- **Email**: Wajib diisi, valid email

### Reset Password
- **Email**: Wajib diisi, valid email
- **Password Baru**: Wajib diisi, min 8 karakter, harus sesuai konfirmasi

## Troubleshooting

### Email reset password tidak terkirim
1. Pastikan `.env` mail config benar
2. Jika menggunakan Gmail, gunakan "App Password", bukan password akun
3. Untuk testing, gunakan Mailpit (default Laragon)
4. Check log file: `storage/logs/laravel.log`

### Token reset invalid
- Token hanya valid 60 menit
- Jangan copy-paste email dari satu browser ke browser lain
- Pastikan database migration sudah jalan: `php artisan migrate`

### Tidak bisa reset password
- Pastikan user model memiliki method `sendPasswordResetNotification()`
- Check apakah `password_reset_tokens` table ada di database
- Pastikan user email terdaftar di database

## Database Schema

### Users Table
```sql
- id (bigint)
- name (string)
- email (string, unique)
- email_verified_at (timestamp, nullable)
- password (string)
- remember_token (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### Password Reset Tokens Table
```sql
- email (string)
- token (string)
- created_at (timestamp)
```

## Testing

### Unit Testing
Untuk menguji fitur, jalankan:
```bash
php artisan test
```

### Manual Testing
1. Register akun baru
2. Coba login dengan akun baru
3. Logout dan request password reset
4. Cek email di Mailpit
5. Reset password
6. Login dengan password baru
7. Akses /datamahasiswa tanpa login
8. Logout dan cek apakah tombol Tambah/Edit/Hapus hilang

## Security Notes

1. Password di-hash menggunakan Bcrypt
2. Reset token secure dan unique
3. CSRF protection pada semua form
4. Input validation pada semua field
5. Rate limiting bisa ditambahkan jika diperlukan

## Next Steps (Opsional)

Untuk enhancement lebih lanjut:
1. Email verification untuk akun baru
2. Two-factor authentication
3. Social login (Google, Facebook, dll)
4. User profile management
5. Change password functionality
6. Account activity log
7. Rate limiting untuk prevent brute force
