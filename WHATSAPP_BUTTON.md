# Floating WhatsApp Button - Documentation

## Fitur yang Ditambahkan

### 1. Database Migration

-   File: `database/migrations/2025_10_08_124339_add_whatsapp_to_company_settings_table.php`
-   Menambahkan kolom:
    -   `whatsapp_number` (string, nullable) - Nomor WhatsApp
    -   `whatsapp_enabled` (boolean, default: true) - Toggle on/off button

### 2. Model Update

-   File: `app/Models/CompanySetting.php`
-   Menambahkan `whatsapp_number` dan `whatsapp_enabled` ke fillable array

### 3. Controller Update

-   File: `app/Http/Controllers/Admin/CompanySettingController.php`
-   Menambahkan validasi untuk WhatsApp fields

### 4. Admin Form

-   File: `resources/views/admin/pages/company-settings/edit.blade.php`
-   Section baru: **WhatsApp Settings**
-   Input fields:
    -   WhatsApp Number (format: 628xxx tanpa + atau spasi)
    -   Enable/Disable checkbox untuk toggle button

### 5. Landing Page

-   File: `resources/views/landing/index.blade.php`
-   Floating button di kanan bawah dengan style:
    -   Background hijau WhatsApp (#25D366)
    -   Icon WhatsApp SVG
    -   Text "Hubungi Kami"
    -   Animasi pulse
    -   Responsive (hide text di mobile)
    -   Shadow effect dengan hover animation

## Cara Penggunaan

### Admin Panel:

1. Login ke Admin Panel
2. Buka **Company Settings**
3. Scroll ke section **WhatsApp Settings**
4. Masukkan nomor WhatsApp dengan format: `628123456789`
    - Gunakan kode negara (62 untuk Indonesia)
    - Nomor tanpa 0 di awal
    - Tanpa tanda + atau spasi
5. Centang checkbox **Enable WhatsApp Button** untuk menampilkan button
6. Klik **Save Changes**

### Format Nomor WhatsApp:

-   ❌ Salah: +62 812 3456 789
-   ❌ Salah: 0812 3456 789
-   ✅ Benar: 628123456789

### Hasil di Website:

-   Floating button muncul di kanan bawah
-   Klik button akan membuka WhatsApp chat
-   Button responsive (text hilang di mobile)
-   Animasi pulse untuk menarik perhatian

## Styling

### Desktop:

-   Button dengan text "Hubungi Kami"
-   Icon WhatsApp 28px
-   Padding: 14px 28px
-   Font-size: 16px

### Mobile (< 768px):

-   Hanya icon WhatsApp
-   Icon 24px
-   Padding: 12px 20px
-   Text disembunyikan

## Kondisi Tampil:

Button hanya muncul jika:

1. `whatsapp_enabled` = true (checkbox dicentang)
2. `whatsapp_number` terisi

Jika salah satu kondisi tidak terpenuhi, button tidak akan tampil.
