# 📐 HAMBURGER MENU - VISUAL GUIDE

**Dokumentasi Visual:** Layout & Struktur Menu  
**Update:** January 2026

---

## 🖥️ DESKTOP VIEW (≥992px)

### Navbar Desktop
```
┌─────────────────────────────────────────────────────────────────────┐
│                                                                     │
│  [🎓] SUAD GANTENG   Home  Profile  Berita  Contact  Data Mhs  [👤] │
│                                                                     │
└─────────────────────────────────────────────────────────────────────┘
```

### Profile Dropdown (Hover)
```
┌────────────────────────────────────────┐
│ [👤] Username (Dropdown Arrow)         │
├────────────────────────────────────────┤
│ [👤] My Profile                        │
│ [📚] Data Mahasiswa                    │
│ [➕] Tambah Mahasiswa  (admin only)    │
├────────────────────────────────────────┤
│ [🚪] Logout                            │
└────────────────────────────────────────┘
```

### Guest View (Not Logged In)
```
┌──────────────────────────────────────────┐
│  ...  [🔐 Login]  [👤+ Register]        │
└──────────────────────────────────────────┘
```

---

## 📱 MOBILE VIEW (<992px)

### Navbar Mobile
```
┌─────────────────────────────────────────┐
│ [🎓] SUAD GANTENG              [☰]     │
└─────────────────────────────────────────┘
```

### Mobile Menu Open (Slide from Right)
```
┌─────────────────────────────────────────────────┐
│ [Webpage Content] │ ┌─────────────────────────┐ │
│                   │ │ Menu              [✕]  │ │
│                   │ ├─────────────────────────┤ │
│                   │ │ 🏠  Home               │ │
│                   │ │ 👤  Profile            │ │
│                   │ │ 📰  Berita             │ │
│                   │ │ ✉️   Contact            │ │
│                   │ │ 📚  Data Mahasiswa     │ │
│                   │ ├─────────────────────────┤ │
│                   │ │ 👤 User Name           │ │
│                   │ │    user@email.com      │ │
│                   │ ├─────────────────────────┤ │
│                   │ │ ➕ Tambah Mahasiswa    │ │
│                   │ │ 🚪 Logout              │ │
│                   │ └─────────────────────────┘ │
└─────────────────────────────────────────────────┘
```

### Mobile Menu Closed
```
┌─────────────────────────────────────────┐
│ [🎓] SUAD GANTENG              [☰]     │
│                                         │
│ [Page Content Below...]                 │
│                                         │
└─────────────────────────────────────────┘
```

---

## 🎨 COLOR & STYLING

### Color Scheme
```
Primary Blue:      #0066CC (Menu items, icons)
Dark Blue:         #004C99 (Hover state)
Light Blue:        #ADD8E6 (Borders, dividers)
White:             #FFFFFF (Background)
Gray:              #333333 (Text)
Red:               #dc3545 (Logout)
Green:             (Register button)
```

### Hover States
```
Menu Item:  Text color changes to #0066CC + light background
Icon:       Scales up slightly (1.1x)
Hamburger:  Scales up (1.1x) + color changes
```

---

## 🎬 ANIMATIONS & INTERACTIONS

### Hamburger Toggle
```
CLICK HAMBURGER ☰
    ↓
Menu slides from right (400ms)
    ↓
Menu is visible with overlay
```

### Menu Close Actions
```
1. Click X button
   ↓ (menu slides out)

2. Click menu item
   ↓ (navigate + menu slides out)

3. Click outside area
   ↓ (menu slides out)

4. Press ESC key
   ↓ (menu slides out)
```

### Menu Item Hover
```
Hover on item
    ↓
Background changes to light blue
    ↓
Left padding increases
    ↓
Text color changes to primary blue
```

---

## 📊 MENU STRUCTURE

### Desktop Menu Items (All Screens)
```
Navigation:
├─ Home
├─ Profile
├─ Berita
├─ Contact
└─ Data Mahasiswa

Authentication:
├─ When Logged In:
│  └─ [👤] Username Dropdown
│     ├─ My Profile
│     ├─ Data Mahasiswa
│     ├─ Tambah Mahasiswa (admin)
│     └─ Logout
│
└─ When Not Logged In:
   ├─ Login Button
   └─ Register Button
```

### Mobile Menu Structure
```
Header:
├─ "Menu" Title
└─ Close Button [✕]

Navigation Items:
├─ Home
├─ Profile
├─ Berita
├─ Contact
└─ Data Mahasiswa

User Section (if logged in):
├─ User Info Card
│  ├─ Avatar Icon
│  ├─ Name
│  └─ Email
├─ Tambah Mahasiswa (admin only)
└─ Logout

Guest Section (if not logged in):
├─ Login
└─ Register
```

---

## 🔄 RESPONSIVE BREAKPOINTS

### Large Desktop (≥1200px)
```
[Full horizontal menu with all items visible]
Hamburger: HIDDEN
Desktop Menu: VISIBLE
```

### Desktop (992px - 1199px)
```
[Horizontal menu]
Hamburger: HIDDEN
Desktop Menu: VISIBLE
```

### Tablet/Small Desktop (768px - 991px)
```
[Hamburger menu becomes visible]
Hamburger: VISIBLE
Desktop Menu: HIDDEN
```

### Mobile Phone (<768px)
```
[Full hamburger menu]
Hamburger: VISIBLE
Desktop Menu: HIDDEN
Screen: Full width
```

---

## 💻 DEVICE PREVIEW

### Desktop (1920x1080)
```
┌──────────────────────────────────────────────────────────┐
│ [🎓] SUAD  Home  Prof  Berita  Contact  Data  [👤 User ▼] │
│                                                          │
│                    [Page Content]                        │
│                                                          │
│                                                          │
└──────────────────────────────────────────────────────────┘
```

### Laptop (1366x768)
```
┌────────────────────────────────────────────────────────┐
│ [🎓] SUAD  Home  Prof  Berita  Contact  Data  [👤 User] │
│                                                        │
│                  [Page Content]                        │
│                                                        │
└────────────────────────────────────────────────────────┘
```

### Tablet (768x1024)
```
┌─────────────────────────────────────────────────────┐
│ [🎓] SUAD GANTENG                        [☰]       │
├─────────────────────────────────────────────────────┤
│                                                     │
│             [Page Content]                          │
│                                                     │
└─────────────────────────────────────────────────────┘
```

### Phone (375x667)
```
┌───────────────────────────────┐
│ [🎓]SUAD              [☰]    │
├───────────────────────────────┤
│   Page Content                │
│                               │
│                               │
└───────────────────────────────┘
```

---

## 🎯 INTERACTION FLOW

### Desktop User Flow
```
1. Page Load
   ↓
2. See Horizontal Menu (≥992px)
   ↓
3. Click Menu Item → Navigate
   ↓
4. Hover Username → Profile Dropdown Opens
   ↓
5. Click Option → Execute Action
```

### Mobile User Flow
```
1. Page Load
   ↓
2. See Hamburger ☰ (< 992px)
   ↓
3. Click Hamburger
   ↓
4. Menu Slides In (400ms animation)
   ↓
5. Click Item OR Click X OR Press ESC
   ↓
6. Menu Closes & Navigate (if item clicked)
```

---

## 🔍 DETAILS CLOSE-UP

### Hamburger Button
```
Position: Top Right Corner
Icon: Three horizontal lines (☰)
Size: 32x32px (touch friendly)
Style: Blue color on hover
Action: Click to toggle menu
```

### Mobile Menu Header
```
┌──────────────────────┐
│ Menu            [✕] │
└──────────────────────┘

- Left: "Menu" text (blue)
- Right: Close button (blue X)
- Action: Click X to close
```

### User Info Card
```
┌──────────────────────────┐
│ 👤 User Name             │
│    user@email.com        │
└──────────────────────────┘

- Large avatar icon
- Bold name
- Email below
- Light blue background
- Border accent
```

### Menu Item (Normal)
```
📱 Menu Item

- Icon on left (blue)
- Text on right (dark)
- Padding: 1rem
- Border radius: 8px
```

### Menu Item (Hover)
```
📱 Menu Item  ← Light blue background
              ← Left padding increased

- Icon on left (blue)
- Text color: blue
- Background: light blue
- Smooth transition
```

---

## 🎨 Z-INDEX LAYERING

```
Fixed Mobile Menu:    z-index: 1000
┌─────────────────────┐
│ Mobile Menu         │
└─────────────────────┘

Dark Overlay:         z-index: 999
(When menu open)

Page Content:         z-index: 1 (default)
```

---

## 📐 DIMENSIONS & SIZING

### Navbar
- Height: Auto (~60px)
- Padding: 0.8rem 1.5rem

### Mobile Menu
- Width: 85% (max 350px)
- Height: 100% (full screen)
- Animation: 400ms slide

### Hamburger Button
- Size: 32x32px
- Touch Friendly: Yes
- Accessible: Yes

### Menu Items
- Padding: 1rem 1.2rem
- Border Radius: 8px
- Font Size: 1rem
- Line Height: 1.5

---

## ✅ VISUAL CHECKLIST

Desktop Layout:
- [ ] Logo on left
- [ ] Menu items horizontal
- [ ] Profile dropdown on right
- [ ] No hamburger visible
- [ ] All items aligned

Mobile Layout:
- [ ] Logo on left
- [ ] Hamburger on right
- [ ] No horizontal menu
- [ ] Full-width navbar

Menu Animation:
- [ ] Smooth slide-in (400ms)
- [ ] Smooth slide-out
- [ ] No jank/stuttering
- [ ] 60fps animation

Responsiveness:
- [ ] Desktop: horizontal menu
- [ ] Tablet: hamburger visible
- [ ] Mobile: hamburger only
- [ ] Transitions work

---

**Visual Guide Complete! 🎨**

*Sekarang Anda bisa membayangkan layout & interaksi hamburger menu!*
