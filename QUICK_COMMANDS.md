# 🚀 QUICK COMMANDS - Development Helper

**Untuk:** Developer yang ingin cepat setup dan test aplikasi

---

## 📋 Essential Commands

### 🎯 Jalankan Aplikasi

```bash
# Terminal 1: Start Laravel Dev Server
cd c:\laragon\www\Divp
php artisan serve

# Output: Laravel development server started on [http://127.0.0.1:8000]
```

### 🗄️ Setup Database

```bash
# Run migrations (one-time)
php artisan migrate

# Reset database
php artisan migrate:reset

# Refresh database (reset + migrate)
php artisan migrate:refresh

# Seed database
php artisan db:seed
```

### 🧹 Clear Cache

```bash
# Clear all caches
php artisan cache:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Clear all (combined)
php artisan cache:clear && php artisan config:clear && php artisan view:clear
```

---

## 🧪 Testing Commands

### 📧 Test Email (Mailpit)

```bash
# Access Mailpit UI
http://localhost:8025

# Send test email via Tinker
php artisan tinker
> Mail::raw('Test', function($m) { $m->to('test@test.com'); })
> exit
```

### 🔍 Debug Database

```bash
# Enter interactive shell
php artisan tinker

# List all users
> User::all()

# Find specific user
> User::find(1)

# Create test user
> User::create(['name' => 'Test', 'email' => 'test@test.com', 'password' => Hash::make('password')])

# Check password reset tokens
> DB::table('password_reset_tokens')->all()

# Exit
> exit
```

### 📝 Check Logs

```bash
# View logs (Linux/Mac)
tail -f storage/logs/laravel.log

# View logs (Windows PowerShell)
Get-Content storage/logs/laravel.log -Tail 50 -Wait
```

---

## 🛠️ Development Commands

### 📚 View Routes

```bash
# List all routes
php artisan route:list

# Filter routes
php artisan route:list | grep register
php artisan route:list | grep password
php artisan route:list | grep mahasiswa
```

### 🏗️ Create New Files

```bash
# Create new controller
php artisan make:controller MyController

# Create new model
php artisan make:model MyModel

# Create new migration
php artisan make:migration create_table_name

# Create new command
php artisan make:command MyCommand

# Create new job
php artisan make:job MyJob
```

### 🔧 Configuration

```bash
# Generate app key
php artisan key:generate

# Publish vendor packages
php artisan vendor:publish

# Optimize autoloader
php artisan optimize
```

---

## 🔐 Security Commands

```bash
# Hash a string
php artisan tinker
> Hash::make('password123')

# Verify hash
> Hash::check('password123', '$2y$12$...')

# Generate token
> Str::random(60)

# Exit
> exit
```

---

## 📊 Database Commands

```bash
# Create database
php artisan db:create

# Fresh migrate (drop + create)
php artisan migrate:fresh

# Rollback all
php artisan migrate:reset

# Rollback last batch
php artisan migrate:rollback

# Status migrations
php artisan migrate:status
```

---

## 🎯 Testing Scenarios

### Scenario 1: Register & Login
```bash
# 1. Open browser
http://localhost:8000/register

# 2. Fill form with:
Nama: Test User
Email: test@example.com
Password: password123
Confirm: password123

# 3. Click "Buat Akun"

# 4. Redirect to login page

# 5. Login with new account
Email: test@example.com
Password: password123

# 6. Click "Login"
```

### Scenario 2: Lupa Password
```bash
# 1. Open forgot password form
http://localhost:8000/forgot-password

# 2. Enter email
Email: admin@example.com

# 3. Click "Kirim Link Reset Password"

# 4. Open Mailpit
http://localhost:8025

# 5. Click email

# 6. Copy reset link from email

# 7. Paste in new browser tab

# 8. Fill reset form
Password Baru: newpassword123
Confirm: newpassword123

# 9. Click "Reset Password"

# 10. Login with new password
```

### Scenario 3: Publik Lihat Mahasiswa
```bash
# 1. Open incognito/private browser

# 2. Go to mahasiswa page
http://localhost:8000/datamahasiswa

# 3. View list (harus bisa lihat)

# 4. Click detail

# 5. Verify: Edit/Delete button tidak ada

# 6. Login

# 7. Refresh page

# 8. Verify: Edit/Delete button ada
```

---

## 🔧 Frequently Used Commands

### Development Quick Setup
```bash
cd c:\laragon\www\Divp
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan serve
```

### Before Commit
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Troubleshooting
```bash
# Check everything
php artisan migrate:status
php artisan route:list | head
Get-Content storage/logs/laravel.log -Tail 20
```

---

## 📝 Tinker Quick Reference

```bash
# Start tinker
php artisan tinker

# User commands
User::all()                           # List all users
User::find(1)                         # Find by ID
User::where('email', 'admin@...')->first()  # Find by email
User::create([...])                  # Create user
$user->update([...])                 # Update user
$user->delete()                      # Delete user

# Password commands
Hash::make('password')                # Hash password
Hash::check('pass', '$hash')         # Check password

# Database commands
DB::table('users')->all()             # Query table
DB::table('users')->count()           # Count rows
DB::table('users')->truncate()        # Clear table

# Exit
exit
```

---

## 🎯 Quick Test Checklist

```bash
# 1. Register new account
→ Go to /register → Fill form → Submit → Verify success

# 2. Login
→ Go to /login → Use registered account → Verify logged in

# 3. View mahasiswa (public)
→ Logout → Go to /datamahasiswa → Verify list visible
→ Verify Edit/Delete buttons not visible

# 4. Edit mahasiswa (protected)
→ Login → Go to /datamahasiswa → Verify Edit/Delete visible
→ Click Edit → Verify can edit

# 5. Lupa password
→ Go to /forgot-password → Enter email → Submit
→ Check Mailpit: http://localhost:8025 → Click email → Verify link

# 6. Reset password
→ From Mailpit, click reset link → Fill new password → Submit
→ Go to /login → Login with new password → Verify success
```

---

## 💡 Tips & Tricks

### Faster Development
```bash
# Watch for file changes and compile
npm run watch

# Run tests on file change
php artisan test --watch
```

### Debugging
```bash
# Add to code for debugging
dd($variable)                 # Dump and die
var_dump($variable)          # Print variable

# In views
{{ dd($variable) }}
{{ var_dump($variable) }}
```

### Database Inspection
```bash
# Access Laravel Debugbar
# Automatically shown at bottom-right in development
# Check queries, performance, etc.
```

---

## 🚀 Deployment Quick Commands

### Before Production
```bash
# Set production
APP_ENV=production
APP_DEBUG=false

# Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Seed if needed
php artisan db:seed
```

### Production Deployment
```bash
git pull origin main
composer install --no-dev
npm install && npm run build
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
```

---

## 📊 Performance Monitoring

```bash
# Check query performance
php artisan tinker
> DB::enableQueryLog()
> User::all()
> dd(DB::getQueryLog())

# Monitor logs
tail -f storage/logs/laravel.log
```

---

## 🎓 Learning Commands

```bash
# View all available commands
php artisan

# Get help for specific command
php artisan migrate --help

# List all routes with details
php artisan route:list -v

# Check config
php artisan config:show
```

---

## 🔒 Security Commands

```bash
# Check for vulnerabilities
php artisan security:check

# Verify CSRF protection
# Automatically handled by Laravel

# Test password hashing
php artisan tinker
> Hash::make('test123')
> Hash::check('test123', '...')
```

---

## 📞 Handy Shortcuts

| Command | What it does |
|---------|-------------|
| `php artisan serve` | Start dev server |
| `php artisan tinker` | Interactive shell |
| `php artisan migrate` | Run migrations |
| `php artisan migrate:fresh` | Reset database |
| `php artisan route:list` | Show all routes |
| `php artisan cache:clear` | Clear cache |
| `tail -f storage/logs/laravel.log` | Watch logs |

---

## 🎯 Complete Development Workflow

```bash
# 1. Setup project
cd c:\laragon\www\Divp
composer install
npm install

# 2. Environment setup
cp .env.example .env
php artisan key:generate

# 3. Database setup
php artisan migrate:fresh --seed

# 4. Start development
php artisan serve

# 5. Open in browser
http://localhost:8000

# 6. Development
# Edit code, save
# Changes auto-reload (with hot reload if configured)

# 7. Before commit
php artisan cache:clear
php artisan test

# 8. Commit code
git add .
git commit -m "Your message"
git push
```

---

## 📚 Documentation Reference

- Fastest Start: [RUNNING_GUIDE.md](RUNNING_GUIDE.md)
- Quick Ref: [QUICK_REFERENCE.md](QUICK_REFERENCE.md)
- Testing: [TESTING_GUIDE.md](TESTING_GUIDE.md)
- Technical: [AUTHENTICATION.md](AUTHENTICATION.md)

---

## 🎉 That's It!

Anda sekarang siap untuk development. Gunakan commands ini untuk mempercepat workflow.

**Happy coding! 🚀**

---

*Last Updated: January 2026*  
*Status: Ready*
