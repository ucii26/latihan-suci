# QUICK REFERENCE - Fitur Registrasi & Lupa Password

## 🎯 Fitur Utama

| Fitur | URL | Publik | Auth | Status |
|-------|-----|--------|------|--------|
| Registrasi | `/register` | ✅ | ❌ | ✅ |
| Login | `/login` | ✅ | ❌ | ✅ |
| Logout | `/logout` | ✅ | ✅ | ✅ |
| Lupa Password | `/forgot-password` | ✅ | ❌ | ✅ |
| Reset Password | `/reset-password/{token}` | ✅ | ❌ | ✅ |
| Lihat Mahasiswa | `/datamahasiswa` | ✅ | ❌ | ✅ |
| Lihat Detail | `/tampildata/{id}` | ✅ | ❌ | ✅ |
| Tambah Mahasiswa | `/tambahmahasiswa` | ❌ | ✅ | ✅ |
| Edit Mahasiswa | `/editdata/{id}` | ❌ | ✅ | ✅ |
| Hapus Mahasiswa | `/delete/{id}` | ❌ | ✅ | ✅ |

---

## 📁 File Structure

```
app/
├── Http/Controllers/Auth/
│   ├── LoginController.php        (existing)
│   ├── RegisterController.php      (NEW)
│   └── ForgotPasswordController.php (NEW)
└── Notifications/
    └── ResetPassword.php           (NEW)

resources/views/
├── login.blade.php                 (MODIFIED)
├── register.blade.php              (NEW)
├── auth/                           (NEW DIR)
│   ├── forgot-password.blade.php   (NEW)
│   └── reset-password.blade.php    (NEW)
└── emails/                         (NEW DIR)
    └── reset-password.blade.php    (NEW)

routes/
└── web.php                         (MODIFIED)

database/migrations/
├── 2014_10_12_000000_create_users_table.php
└── 2014_10_12_100000_create_password_reset_tokens_table.php

Documentation/
├── AUTHENTICATION.md               (NEW)
├── SETUP_GUIDE.md                 (NEW)
├── TESTING_GUIDE.md               (NEW)
├── IMPLEMENTATION_CHECKLIST.md    (NEW)
└── QUICK_REFERENCE.md             (THIS FILE)
```

---

## 🔑 Validation Rules

### Registrasi
```
name:       required, string, max:255
email:      required, email, unique:users, max:255
password:   required, string, min:8, confirmed
```

### Lupa Password
```
email:      required, email
```

### Reset Password
```
token:      required
email:      required, email
password:   required, string, min:8, confirmed
```

---

## 📨 Email Configuration (.env)

```env
# Development (Mailpit)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"

# Production (Gmail - Example)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

---

## 🧪 Quick Test Commands

```bash
# Test Registration
curl -X POST http://localhost/register \
  -d "name=Test&email=test@test.com&password=password123&password_confirmation=password123"

# Test Login
curl -c cookies.txt -X POST http://localhost/login \
  -d "email=test@test.com&password=password123"

# Test Forgot Password
curl -X POST http://localhost/forgot-password \
  -d "email=test@test.com"

# View Routes
php artisan route:list | grep -E "register|password|mahasiswa"

# Database Check
php artisan tinker
# U::all()  // lihat semua users
# exit
```

---

## 🔒 Security Checklist

- ✅ Password hashed dengan Bcrypt
- ✅ CSRF token protection
- ✅ Input validation
- ✅ SQL injection prevention
- ✅ XSS prevention (Blade escaping)
- ✅ Unique email validation
- ✅ Token expiration (60 min)
- ✅ Authentication middleware
- ✅ Authorization checks

---

## 🚨 Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Email tidak terkirim | Check `.env` mail config, pastikan Mailpit running |
| Token invalid/expired | Token hanya valid 60 min, request reset baru |
| Registrasi gagal | Check validation error, email mungkin sudah ada |
| Edit/Hapus tidak muncul | Pastikan user sudah login |
| Password reset crash | Run `php artisan migrate` |

---

## 📞 Support Information

**Database User Table:**
- Columns: id, name, email, password, remember_token, created_at, updated_at
- Primary Key: id
- Unique: email

**Password Reset Table:**
- Columns: email, token, created_at
- Purpose: Menyimpan token reset password temporary

**Controllers:**
- `RegisterController` → Handle registrasi
- `ForgotPasswordController` → Handle lupa & reset password
- `LoginController` → Handle login/logout (existing)

**Notifications:**
- `ResetPassword` → Send email reset password

---

## 🎓 User Flows

### Flow 1: Registrasi & Login
```
Publik → /register → Isi Form → Validasi → Create User → /login → Success
```

### Flow 2: Lupa Password
```
User → /forgot-password → Isi Email → Check Database → Send Email → 
Email Received → Click Link → /reset-password/{token} → Isi Password Baru → 
Validasi → Update Password → /login → Success
```

### Flow 3: Akses Mahasiswa
```
Publik → /datamahasiswa → Lihat List → /tampildata/{id} → Lihat Detail
(No Edit/Delete buttons)

Login User → /datamahasiswa → Lihat List → /tampildata/{id} → 
Lihat Detail + Edit/Delete Buttons → Modify Data
```

---

## 🔄 Database Workflow

```
Registrasi:
1. Form validation ✓
2. Hash password
3. Create user di table users
4. Redirect login dengan pesan sukses

Lupa Password:
1. Get email dari form
2. Find user by email
3. Generate token
4. Save ke password_reset_tokens table
5. Send email dengan link + token
6. User klik link
7. Verify token
8. Update password
9. Delete token dari table

Mahasiswa (Publik):
1. Query dari database
2. Tampilkan di view (no edit/delete)

Mahasiswa (Login):
1. Check auth
2. Query dari database
3. Tampilkan dengan edit/delete buttons
4. Handle create/update/delete
```

---

## ✅ Deployment Checklist

- [ ] Run migrations: `php artisan migrate`
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Update `.env` dengan production mail config
- [ ] Test registrasi feature
- [ ] Test lupa password feature
- [ ] Test mahasiswa view (publik & login)
- [ ] Test security (CSRF, validation, auth)
- [ ] Monitor logs: `tail -f storage/logs/laravel.log`

---

## 📚 Related Files

- [Detailed Documentation](AUTHENTICATION.md)
- [Setup Guide](SETUP_GUIDE.md)
- [Testing Guide](TESTING_GUIDE.md)
- [Implementation Checklist](IMPLEMENTATION_CHECKLIST.md)

---

**Last Updated:** January 2026  
**Status:** ✅ Ready for Testing  
**Version:** 1.0
