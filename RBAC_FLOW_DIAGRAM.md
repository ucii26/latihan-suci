# 🔄 Role-Based Access Control - Flow Diagram

## 📊 System Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                        DIVP APPLICATION                         │
└─────────────────────────────────────────────────────────────────┘

                        ┌──────────┐
                        │ Database │
                        │  Users   │
                        │ role COL │
                        └──────────┘
                             ▲
                             │
                    ┌────────┴────────┐
                    │                 │
              ┌─────▼─────┐      ┌───▼──────┐
              │ role='user'│      │ role='admin'│
              │ (Public)   │      │ (Admin)    │
              └────────────┘      └────────────┘
                    │                 │
        ┌───────────┴─────────┐  ┌────┴────────────┐
        │                     │  │                 │
        ▼                     ▼  ▼                 ▼
    [LOGIN]             [LOGIN]          [ADMIN SETUP]
        │                  │                   │
        ▼                  ▼                   ▼
    User Views         Admin Views        Create Admin
        │                  │                   │
        ├─ Home            ├─ Home             └─► Database
        ├─ Profile         ├─ Profile              role='admin'
        ├─ Data Mahasiswa  ├─ Data Mahasiswa
        ├─ Berita          ├─ Berita
        └─ Logout          ├─ Logout
                           ├─ Tambah Mahasiswa ✅ ADMIN ONLY
                           ├─ Edit Mahasiswa   ✅ ADMIN ONLY
                           └─ Hapus Mahasiswa  ✅ ADMIN ONLY
```

---

## 🔐 Access Control Flow

```
┌──────────────────────────────────────────────────────────────────┐
│ USER MENGAKSES ROUTE ADMIN                                      │
└──────────────────────────────────────────────────────────────────┘

Route: /tambahmahasiswa, /insertdata, /editdata/{id}, /delete/{id}

                          ▼
           ┌──────────────────────────────┐
           │ Middleware: auth             │
           │ (Apakah user sudah login?)   │
           └──────────────────────────────┘
                          │
                ┌─────────┴──────────┐
                │                    │
              NO                    YES
                │                    │
                ▼                    ▼
           [403 ERROR]      ┌──────────────────────────┐
                            │ Middleware: admin        │
                            │ (role === 'admin'?)      │
                            └──────────────────────────┘
                                      │
                            ┌─────────┴──────────┐
                            │                    │
                          YES                   NO
                            │                    │
                            ▼                    ▼
                       [GRANTED]            [403 FORBIDDEN]
                       Access Page
```

---

## 📝 Registration Flow

```
┌──────────────────────────────────────────────────────────────────┐
│ PUBLIC USER REGISTRATION                                        │
└──────────────────────────────────────────────────────────────────┘

      User → /register
              ▼
      ┌──────────────────┐
      │  Show Form       │
      │  - Nama          │
      │  - Email         │
      │  - Password      │
      └──────────────────┘
              ▼
      User Submit
              ▼
      ┌──────────────────────────────┐
      │ Validate Input               │
      │ - Email unique?              │
      │ - Password min 8?            │
      │ - Password match confirm?    │
      └──────────────────────────────┘
              ▼
      ┌──────────────────────────────┐
      │ Create User                  │
      │ name: [user input]           │
      │ email: [user input]          │
      │ password: [hashed]           │
      │ role: 'user' ← DEFAULT       │
      └──────────────────────────────┘
              ▼
      ┌──────────────────────────────┐
      │ Redirect to /login           │
      │ Message: "Registrasi Berhasil"
      └──────────────────────────────┘
              ▼
      User Login
              ▼
      Database Check:
      ├─ Email ada?
      ├─ Password cocok?
      └─ role = 'user'
              ▼
      ┌──────────────────────────────┐
      │ Session Created              │
      │ User dapat akses:            │
      │ ✅ Lihat data mahasiswa      │
      │ ✅ Edit profile              │
      │ ❌ Tambah mahasiswa          │
      │ ❌ Edit mahasiswa            │
      │ ❌ Hapus mahasiswa           │
      └──────────────────────────────┘
```

---

## 👨‍💼 Admin Setup Flow

```
┌──────────────────────────────────────────────────────────────────┐
│ ADMIN FIRST-TIME SETUP                                          │
└──────────────────────────────────────────────────────────────────┘

      Visit → /admin-setup
              ▼
      ┌──────────────────────────────┐
      │ Check: Admin Exists?         │
      └──────────────────────────────┘
              │
        ┌─────┴─────┐
        │           │
       YES          NO
        │           │
        ▼           ▼
   [Redirect]  Show Form
   to /login   - Nama Admin
               - Email Admin
               - Password
               - Konfirmasi
              ▼
         Admin Submit
              ▼
      ┌──────────────────────────────┐
      │ Validate Input               │
      │ (Same as user registration)  │
      └──────────────────────────────┘
              ▼
      ┌──────────────────────────────┐
      │ Create Admin                 │
      │ name: [admin input]          │
      │ email: [admin input]         │
      │ password: [hashed]           │
      │ role: 'admin' ← SPECIAL      │
      └──────────────────────────────┘
              ▼
      ┌──────────────────────────────┐
      │ Redirect to /login           │
      │ Message: "Admin Created!"    │
      └──────────────────────────────┘
              ▼
      Admin Login
              ▼
      Database Check:
      ├─ Email ada?
      ├─ Password cocok?
      └─ role = 'admin' ✓
              ▼
      ┌──────────────────────────────┐
      │ Session Created              │
      │ Admin dapat akses:           │
      │ ✅ Lihat data mahasiswa      │
      │ ✅ Edit profile              │
      │ ✅ Tambah mahasiswa          │
      │ ✅ Edit mahasiswa            │
      │ ✅ Hapus mahasiswa           │
      │ ✅ Admin Menu di navbar      │
      └──────────────────────────────┘
```

---

## 🎯 Access Control Decision Tree

```
                    ┌─────────────────────┐
                    │ User Request Route  │
                    └──────────┬──────────┘
                               │
                    ┌──────────▼──────────┐
                    │ Route Middleware?   │
                    │ ['auth', 'admin']   │
                    └──────────┬──────────┘
                               │
                    ┌──────────▼──────────┐
                    │ Auth Middleware     │
                    │ Logged in?          │
                    └──────────┬──────────┘
                               │
                ┌──────────────┴──────────────┐
                │                             │
              ❌ NO                          ✅ YES
                │                             │
                ▼                             ▼
            Redirect              ┌──────────────────────┐
            to /login             │ Admin Middleware     │
                                  │ role === 'admin'?    │
                                  └──────────┬───────────┘
                                             │
                                    ┌────────┴────────┐
                                    │                 │
                                  ❌ NO             ✅ YES
                                    │                 │
                                    ▼                 ▼
                                [403 ERROR]     [GRANT ACCESS]
                                FORBIDDEN       Continue to route
```

---

## 🔗 Navbar Menu Flow

### Desktop View
```
┌──────────────────────────────────────────────────────┐
│ Navbar                                               │
├──────────────────────────────────────────────────────┤
│ Logo  Home  Profile  Berita  Contact  DataMahasiswa  │
│                                              [User ▼]│
│                                                      │
│  IF role === 'admin'                                │
│  ┌─────────────────────────┐                        │
│  │ Profile                 │                        │
│  │ My Data Mahasiswa       │                        │
│  │ ─────────────────────   │                        │
│  │ ✅ Tambah Mahasiswa     │ ← ADMIN ONLY           │
│  │ ─────────────────────   │                        │
│  │ Logout                  │                        │
│  └─────────────────────────┘                        │
│                                                      │
│  IF role === 'user'                                 │
│  ┌─────────────────────────┐                        │
│  │ Profile                 │                        │
│  │ My Data Mahasiswa       │                        │
│  │ ─────────────────────   │                        │
│  │ Logout                  │                        │
│  └─────────────────────────┘                        │
│  (No "Tambah Mahasiswa" menu)                       │
└──────────────────────────────────────────────────────┘
```

### Mobile View
```
┌──────────────────────────────────────────────────────┐
│ Navbar with Hamburger (≡)                           │
│                                                      │
│ Click ≡ → Dropdown Menu                            │
│ ┌──────────────────────────────────────────────────┐│
│ │ Menu                              [X]             ││
│ ├──────────────────────────────────────────────────┤│
│ │ Home                                             ││
│ │ Profile                                          ││
│ │ Berita                                           ││
│ │ Contact                                          ││
│ │ Data Mahasiswa                                   ││
│ ├──────────────────────────────────────────────────┤│
│ │ [User Info]                                      ││
│ │ Name: Admin                                      ││
│ │ Email: admin@divp.com                            ││
│ │                                                  ││
│ │ IF role === 'admin'                              ││
│ │ ✅ Tambah Mahasiswa ← ADMIN ONLY                 ││
│ │                                                  ││
│ │ Logout                                           ││
│ └──────────────────────────────────────────────────┘│
└──────────────────────────────────────────────────────┘
```

---

## 📊 Database State Diagram

### Before Migration
```
Users Table
┌─────────┬─────────┬────────┬──────────────┬──────────────────┐
│ id (PK) │ name    │ email  │ password     │ email_verified.. │
├─────────┼─────────┼────────┼──────────────┼──────────────────┤
│ 1       │ Admin   │ a@d.co │ hashed_pass1 │ NULL             │
│ 2       │ User    │ u@d.co │ hashed_pass2 │ NULL             │
└─────────┴─────────┴────────┴──────────────┴──────────────────┘
```

### After Migration
```
Users Table
┌─────────┬─────────┬────────┬──────────────┬────────┬──────────┐
│ id (PK) │ name    │ email  │ password     │ role   │ email... │
├─────────┼─────────┼────────┼──────────────┼────────┼──────────┤
│ 1       │ Admin   │ a@d.co │ hashed_pass1 │ admin  │ NULL     │
│ 2       │ User    │ u@d.co │ hashed_pass2 │ user   │ NULL     │
│ 3       │ User2   │ u2@d.co│ hashed_pass3 │ user   │ NULL     │
└─────────┴─────────┴────────┴──────────────┴────────┴──────────┘
            ▲                                    ▲
            │                                    │
    Existing Column              NEW Column (Enum: 'user'|'admin')
                                 Default: 'user'
```

---

## 🔐 Security Layers

```
                    User Request
                          ▼
                 ┌─────────────────┐
    Layer 1:     │  Route Defined  │
    Frontend     │  with Middleware│
                 └────────┬────────┘
                          ▼
                 ┌─────────────────┐
    Layer 2:     │ Auth Middleware │
    Backend      │ Check: Logged?  │
    Auth         └────────┬────────┘
                          ▼
                 ┌─────────────────┐
    Layer 3:     │ Admin Middleware│
    Backend      │ Check: role?    │
    Authorization└────────┬────────┘
                          ▼
                 ┌─────────────────┐
    Layer 4:     │ Controller      │
    Business     │ Logic Executed  │
    Logic        └────────┬────────┘
                          ▼
                 ┌─────────────────┐
    Layer 5:     │ Database Query  │
    Data         │ CRUD Operation  │
                 └─────────────────┘

    All layers must pass for access to be granted!
```

---

## 📈 User Journey Map

```
FIRST-TIME VISITOR
        │
        ├─► Want to register?
        │   └─► /register
        │       └─► Become: User (role='user')
        │
        └─► Want to be admin?
            └─► /admin-setup (only if no admin exists)
                └─► Become: Admin (role='admin')

RETURNING VISITOR (User)
        │
        └─► /login
            └─► View Data Mahasiswa ✅
            └─► Edit Profile ✅
            └─► Try /tambahmahasiswa → 403 ❌

RETURNING VISITOR (Admin)
        │
        └─► /login
            └─► View Data Mahasiswa ✅
            └─► Edit Profile ✅
            └─► Add Mahasiswa ✅
            └─► Edit Mahasiswa ✅
            └─► Delete Mahasiswa ✅
            └─► See Admin Menu ✅
```

---

## ✅ Complete System Check

```
┌────────────────────────────────────────────────────┐
│ System Component Status                            │
├────────────────────────────────────────────────────┤
│ ✅ Migration Created & Executed                    │
│ ✅ Role Column Added to Users Table                │
│ ✅ User Model Updated (fillable)                   │
│ ✅ RegisterController (set role='user')            │
│ ✅ AdminSetupController (set role='admin')         │
│ ✅ CheckAdmin Middleware Created                   │
│ ✅ Middleware Registered in Kernel                 │
│ ✅ Routes Protected with Admin Middleware          │
│ ✅ Navbar Updated (role check)                     │
│ ✅ Admin Setup View Created                        │
│ ✅ Documentation Complete                          │
├────────────────────────────────────────────────────┤
│ 🎉 SYSTEM READY FOR PRODUCTION 🎉                 │
└────────────────────────────────────────────────────┘
```

---

This complete flow diagram shows how the Role-Based Access Control system works from registration through to access control enforcement!
