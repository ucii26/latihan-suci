# API & Manual Testing Guide

## 🧪 Manual Testing di Browser

### Test 1: Registrasi Akun
```
1. Buka: http://localhost/register (atau domain Anda)
2. Isi form:
   - Nama: "Mahasiswa Baru"
   - Email: "mahasiswa@example.com"
   - Password: "password123"
   - Konfirmasi: "password123"
3. Klik "Buat Akun"
4. Expected: Berhasil registrasi, redirect ke login dengan pesan "Registrasi berhasil!"
```

### Test 2: Validasi Registrasi - Email Duplikat
```
1. Buka: http://localhost/register
2. Isi form dengan email yang sudah terdaftar (misal: admin@example.com)
3. Klik "Buat Akun"
4. Expected: Error "Email sudah terdaftar"
```

### Test 3: Validasi Registrasi - Password Pendek
```
1. Buka: http://localhost/register
2. Isi form dengan password "1234567" (hanya 7 karakter)
3. Klik "Buat Akun"
4. Expected: Error "Password minimal 8 karakter"
```

### Test 4: Validasi Registrasi - Password Tidak Cocok
```
1. Buka: http://localhost/register
2. Isi:
   - Password: "password123"
   - Konfirmasi: "password456"
3. Klik "Buat Akun"
4. Expected: Error "Password tidak cocok dengan konfirmasi"
```

### Test 5: Login dengan Akun Baru
```
1. Setelah registrasi berhasil, di halaman login
2. Isi:
   - Email: email yang baru didaftar
   - Password: password yang baru didaftar
3. Klik "Login"
4. Expected: Berhasil login, redirect ke home page
```

### Test 6: Lihat Mahasiswa (Publik - Tanpa Login)
```
1. Logout atau buka browser private/incognito
2. Buka: http://localhost/datamahasiswa
3. Expected: Bisa melihat daftar mahasiswa
4. Klik salah satu mahasiswa untuk detail
5. Expected: Bisa melihat detail, tapi tombol Edit/Hapus tidak ada
```

### Test 7: Tambah Mahasiswa (Harus Login)
```
1. Setelah logout, buka: http://localhost/tambahmahasiswa
2. Expected: Redirect ke login (karena protected)
3. Login dengan akun Anda
4. Buka: http://localhost/tambahmahasiswa
5. Expected: Bisa akses form tambah mahasiswa
6. Isi form dan submit
7. Expected: Berhasil ditambahkan
```

### Test 8: Lupa Password - Step 1
```
1. Buka: http://localhost/forgot-password
2. Isi email dengan email yang sudah terdaftar
3. Klik "Kirim Link Reset Password"
4. Expected: Pesan "Kami telah mengirimkan email reset password Anda!"
```

### Test 9: Lupa Password - Step 2 (Check Email)
```
1. Buka: http://localhost:8025 (Mailpit)
2. Cari email terbaru dari aplikasi Divp
3. Klik email untuk buka
4. Expected: Lihat isi email dengan tombol "Reset Password"
5. Klik tombol atau copy link
```

### Test 10: Lupa Password - Step 3 (Reset)
```
1. Dari email, klik "Reset Password"
2. Atau buka link dari Mailpit di browser
3. Form akan terbuka dengan:
   - Email sudah terisi
   - Token tersembunyi
4. Isi:
   - Password Baru: "newpassword123"
   - Konfirmasi: "newpassword123"
5. Klik "Reset Password"
6. Expected: Berhasil reset, redirect ke login dengan pesan sukses
```

### Test 11: Login dengan Password Baru
```
1. Di halaman login
2. Isi:
   - Email: email yang di-reset
   - Password: "newpassword123"
3. Klik "Login"
4. Expected: Berhasil login dengan password baru
```

### Test 12: Edit Mahasiswa (Harus Login)
```
1. Login dengan akun Anda
2. Buka: http://localhost/datamahasiswa
3. Klik salah satu mahasiswa
4. Expected: Tombol "Edit" tersedia
5. Klik Edit, ubah data, simpan
6. Expected: Data berhasil diupdate
```

### Test 13: Hapus Mahasiswa (Hanya Login)
```
1. Login dengan akun Anda
2. Buka: http://localhost/datamahasiswa
3. Klik salah satu mahasiswa
4. Expected: Tombol "Hapus" tersedia (jika user adalah pembuat)
5. Klik Hapus
6. Expected: Data berhasil dihapus
```

---

## 🔧 Testing via Artisan Tinker

```bash
# Masuk ke tinker
php artisan tinker

# Create user baru
$user = User::create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => Hash::make('password123')
]);

# Check user
$user = User::where('email', 'test@example.com')->first();
dd($user);

# Cek semua users
User::all();

# Delete user
User::where('email', 'test@example.com')->delete();

# Exit tinker
exit
```

---

## 📧 Testing Email (Mailpit)

### Akses Mailpit UI
```
URL: http://localhost:8025
Menampilkan: Semua email yang dikirim dari aplikasi
```

### Check Email Reset Password
```
1. Request password reset di /forgot-password
2. Buka Mailpit: http://localhost:8025
3. Cari email terbaru
4. Baca isi email dan copy link reset
5. Paste link di browser baru
```

### Send Test Email (Artisan)
```bash
# Create test email job
php artisan make:mail TestEmail

# Send test via tinker
Notification::route('mail', 'test@example.com')
    ->notify(new ResetPassword('token123'));
```

---

## 🐛 Debugging

### Check Laravel Logs
```bash
# View live logs
tail -f storage/logs/laravel.log

# Windows PowerShell
Get-Content storage/logs/laravel.log -Tail 50 -Wait
```

### Check Database
```bash
php artisan tinker

# Check users table
User::all();

# Check password reset tokens
DB::table('password_reset_tokens')->all();

# Check specific token
DB::table('password_reset_tokens')
    ->where('email', 'test@example.com')
    ->first();
```

### Check Routes
```bash
# List semua routes
php artisan route:list

# Filter routes
php artisan route:list | grep register
php artisan route:list | grep password
php artisan route:list | grep mahasiswa
```

### Check Configuration
```bash
php artisan tinker

# Check mail config
config('mail');

# Check auth config
config('auth');

# Check password config
config('auth.passwords');
```

---

## 🔐 Security Testing

### SQL Injection Test
```
1. Register dengan email: "admin'--"
2. Expected: Validation error (email format invalid)
```

### XSS Test
```
1. Register dengan nama: "<script>alert('xss')</script>"
2. Expected: Tag tidak dijalankan, tersimpan sebagai string
```

### CSRF Test
```
1. Coba POST ke /register tanpa CSRF token
2. Expected: 419 error (token mismatch)
```

### Authorization Test
```
1. Login dengan user biasa
2. Coba access /tambahmahasiswa langsung
3. Expected: Bisa access (auth middleware work)
4. Logout
5. Coba access /tambahmahasiswa
6. Expected: Redirect ke login (protected)
```

---

## 📊 Performance Testing

### Check Database Queries
```bash
php artisan debugbar:publish
# Buka Laravel Debugbar (bottom-right di development)
```

### Check Load Time
```bash
# Buka browser devtools (F12)
# Buka Network tab
# Refresh page
# Check "DOMContentLoaded" time
```

---

## 🚀 Deployment Testing

### Test Production Mode
```bash
# Set APP_ENV=production
php artisan config:cache
php artisan route:cache

# Test aplikasi
# Pastikan tidak ada error di browser
```

### Test Email di Production
```
# Update .env dengan production mail config
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=app-password

# Test password reset
```

---

## 📋 Checklist Pengujian

- [ ] Registrasi berhasil dengan data valid
- [ ] Registrasi gagal dengan email duplikat
- [ ] Registrasi gagal dengan password kurang 8 karakter
- [ ] Registrasi gagal dengan password tidak cocok
- [ ] Login berhasil dengan akun baru
- [ ] Lihat mahasiswa tanpa login
- [ ] Lihat detail mahasiswa tanpa login
- [ ] Tambah mahasiswa hanya bisa saat login
- [ ] Edit mahasiswa hanya bisa saat login
- [ ] Hapus mahasiswa hanya bisa saat login
- [ ] Lupa password request berhasil
- [ ] Email reset password diterima
- [ ] Reset password via email link berhasil
- [ ] Login dengan password baru berhasil
- [ ] Logout bekerja
- [ ] Tombol edit/hapus tidak muncul saat logout
- [ ] CSRF protection bekerja
- [ ] SQL injection tidak berhasil
- [ ] XSS tidak berhasil
