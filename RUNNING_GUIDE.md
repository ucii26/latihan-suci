# 🚀 PANDUAN MENJALANKAN APLIKASI DIVP

## 📋 Persyaratan

- ✅ Laravel 10+
- ✅ PHP 8.0+
- ✅ MySQL/MariaDB
- ✅ Composer
- ✅ Node.js (opsional)

---

## 🏃 Menjalankan Aplikasi

### Step 1: Terminal - Start Laravel Development Server

```bash
cd c:\laragon\www\Divp
php artisan serve
```

**Output:**
```
Laravel development server started on [http://127.0.0.1:8000]
```

### Step 2: Akses Aplikasi

Buka browser dan kunjungi:

```
http://localhost:8000
```

atau

```
http://127.0.0.1:8000
```

---

## 📧 Menjalankan Mailpit (untuk Testing Email)

Mailpit sudah berjalan default di Laragon. Jika perlu akses Mailpit UI:

```
http://localhost:8025
```

Atau jalankan manual:

```bash
mailpit
```

---

## 🎯 Akses Fitur Aplikasi

| Halaman | URL | Deskripsi |
|---------|-----|-----------|
| Home | http://localhost:8000 | Halaman utama |
| Register | http://localhost:8000/register | Registrasi akun baru |
| Login | http://localhost:8000/login | Login |
| Mahasiswa (Public) | http://localhost:8000/datamahasiswa | Lihat database mahasiswa |
| Lupa Password | http://localhost:8000/forgot-password | Request password reset |
| Mailpit | http://localhost:8025 | Email testing |

---

## 🔧 Setup Pertama Kali

Jika baru pertama kali running aplikasi:

### 1. Install Dependencies
```bash
cd c:\laragon\www\Divp
composer install
npm install
```

### 2. Generate Application Key
```bash
php artisan key:generate
```

### 3. Run Database Migrations
```bash
php artisan migrate
```

### 4. Seed Database (Optional)
```bash
php artisan db:seed
```

### 5. Build Assets (Optional)
```bash
npm run build
```

---

## 📝 Akun Demo

Untuk testing, gunakan akun demo ini:

**Email:** `admin@example.com`  
**Password:** `password123`

---

## 🧪 Testing Checklist

### ✅ Test 1: Registrasi
1. Buka: http://localhost:8000/register
2. Isi form dengan data baru
3. Klik "Buat Akun"
4. Seharusnya berhasil

### ✅ Test 2: Login
1. Buka: http://localhost:8000/login
2. Gunakan akun admin
3. Klik "Login"
4. Seharusnya berhasil

### ✅ Test 3: Lihat Mahasiswa (Public)
1. Logout atau buka incognito
2. Buka: http://localhost:8000/datamahasiswa
3. Seharusnya bisa lihat daftar mahasiswa

### ✅ Test 4: Lupa Password
1. Buka: http://localhost:8000/forgot-password
2. Masukkan email: admin@example.com
3. Klik "Kirim Link Reset Password"
4. Buka Mailpit: http://localhost:8025
5. Klik link di email
6. Isi password baru dan reset
7. Login dengan password baru

---

## 🛠️ Troubleshooting

### Masalah: "Connection Refused" / Tidak bisa connect ke database

**Solusi:**
```bash
# Pastikan database running
# Di Laragon, klik "Start All"

# Check database config di .env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Buat database jika belum ada
# Di Laragon: MySQL > Create New Database
# Atau via command:
php artisan db:create
```

### Masalah: "Class not found" / Error migration

**Solusi:**
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear

# Run migration
php artisan migrate:refresh
```

### Masalah: Email tidak terkirim

**Solusi:**
```bash
# Check .env mail config
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025

# Test via tinker
php artisan tinker
> Mail::raw('Test', function($m) { $m->to('test@test.com'); })
```

### Masalah: Assets (CSS/JS) tidak load

**Solusi:**
```bash
# Build assets
npm run build

# Atau compile dev
npm run dev
```

---

## 📂 Project Structure

```
laragon/www/Divp/
├── app/                          # Aplikasi code
│   ├── Http/Controllers/         # Controllers
│   │   └── Auth/                 # Auth controllers (register, login, forgot)
│   ├── Models/                   # Models (User, Mahasiswa, etc)
│   └── Notifications/            # Notifications (email reset password)
│
├── routes/
│   └── web.php                   # Web routes (register, login, mahasiswa, etc)
│
├── resources/
│   └── views/
│       ├── login.blade.php       # Login page (updated)
│       ├── register.blade.php    # Register page (NEW)
│       ├── auth/                 # Auth views (NEW)
│       │   ├── forgot-password.blade.php
│       │   └── reset-password.blade.php
│       └── emails/               # Email templates (NEW)
│           └── reset-password.blade.php
│
├── database/
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Database seeders
│
├── storage/
│   └── logs/                     # Log files
│
├── public/
│   ├── css/                      # CSS files
│   └── images/                   # Images
│
└── .env                          # Environment configuration
```

---

## 🔍 Debugging & Logs

### View Application Logs
```bash
tail -f storage/logs/laravel.log
```

Windows PowerShell:
```powershell
Get-Content storage/logs/laravel.log -Tail 50 -Wait
```

### Database Debugging
```bash
php artisan tinker

# List all users
> User::all()

# Find specific user
> User::find(1)

# Create test user
> User::create(['name' => 'Test', 'email' => 'test@test.com', 'password' => Hash::make('password')])

# Exit tinker
> exit
```

### Check Routes
```bash
php artisan route:list
```

---

## 🎯 Quick Commands

```bash
# Clear all cache
php artisan cache:clear && php artisan config:clear

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Reset database
php artisan migrate:reset

# Refresh database (reset + migrate)
php artisan migrate:refresh

# Seed database
php artisan db:seed

# Create new migration
php artisan make:migration create_table_name

# Create new controller
php artisan make:controller ControllerName

# Generate application key
php artisan key:generate

# Optimize application
php artisan optimize

# Start tinker (interactive shell)
php artisan tinker
```

---

## 📊 Database Tables

### Users Table
```sql
CREATE TABLE users (
  id bigint PRIMARY KEY AUTO_INCREMENT,
  name varchar(255),
  email varchar(255) UNIQUE,
  email_verified_at timestamp,
  password varchar(255),
  remember_token varchar(100),
  created_at timestamp,
  updated_at timestamp
);
```

### Password Reset Tokens Table
```sql
CREATE TABLE password_reset_tokens (
  email varchar(255),
  token varchar(255),
  created_at timestamp
);
```

---

## 🚀 Production Deployment

### Before Deploy:
1. [ ] Update `.env` dengan production config
2. [ ] Change `APP_DEBUG=false`
3. [ ] Update `APP_URL` ke domain production
4. [ ] Configure mail dengan production email
5. [ ] Run `php artisan config:cache`
6. [ ] Run `php artisan route:cache`
7. [ ] Run `php artisan view:cache`
8. [ ] Setup SSL certificate
9. [ ] Configure server (Nginx/Apache)
10. [ ] Setup database production

### Deploy:
```bash
git pull origin main
composer install --no-dev
npm install && npm run build
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
```

---

## 📞 Support

Jika ada error atau masalah:

1. **Check logs:** `storage/logs/laravel.log`
2. **Run migrations:** `php artisan migrate`
3. **Clear cache:** `php artisan cache:clear`
4. **Read documentation:** `AUTHENTICATION.md`, `SETUP_GUIDE.md`
5. **Check database:** `php artisan tinker` → `User::all()`

---

## 📚 Dokumentasi

- [Dokumentasi Fitur](AUTHENTICATION.md)
- [Setup Guide](SETUP_GUIDE.md)
- [Testing Guide](TESTING_GUIDE.md)
- [Quick Reference](QUICK_REFERENCE.md)
- [Implementation Checklist](IMPLEMENTATION_CHECKLIST.md)
- [Update Summary](README_UPDATE.md)

---

## ✅ Status

**✅ Ready for Production**

Semua fitur sudah terimplementasi dan siap untuk digunakan:
- ✅ Registrasi publik
- ✅ Lupa password
- ✅ Database mahasiswa publik
- ✅ Protected operations untuk authenticated users

---

**Enjoy using Divp! 🎉**

Jika ada pertanyaan atau issue, silakan check documentation files atau contact support.
