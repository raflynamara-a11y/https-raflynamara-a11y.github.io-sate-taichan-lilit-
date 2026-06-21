# 📋 PANDUAN SETUP SATE TAICAN LILIT - PHP NATIVE + XAMPP + MySQL

## 📦 Struktur Project

```
Sate Taichan Lilit/
├── config/
│   ├── config.php              # Konfigurasi database & aplikasi
│   └── database.php            # Class koneksi database
├── includes/
│   ├── header.php              # Template header
│   └── footer.php              # Template footer
├── pages/
│   ├── pengenalan.php
│   ├── keunggulan.php
│   ├── fitur.php
│   ├── cara.php
│   ├── bahan.php
│   └── alat.php
├── assets/
│   ├── css/
│   │   └── style.css           # Styling website
│   └── js/
│       └── script.js           # JavaScript interaktif
├── db/
│   └── database.sql            # SQL database schema
├── index.php                   # Entry point aplikasi
├── IMG. Produk sate Taican Lilit.png
├── (dan semua gambar lainnya)
└── README.md                   # File ini

```

## 🚀 Langkah-Langkah Setup

### 1️⃣ Persiapan XAMPP

1. **Download XAMPP** dari https://www.apachefriends.org/ (jika belum ada)
2. **Install XAMPP** di komputer Anda
3. **Buka XAMPP Control Panel**

### 2️⃣ Konfigurasi Database MySQL

1. **Hidupkan MySQL** - Klik tombol "Start" pada MySQL di XAMPP Control Panel
2. **Akses phpMyAdmin**:
   - Buka browser
   - Ketik: `http://localhost/phpmyadmin`
   - Login dengan user: `root` (tanpa password)

3. **Buat Database**:
   - Di phpMyAdmin, klik menu "SQL"
   - Copy semua isi file `db/database.sql`
   - Paste ke dalam text area SQL
   - Klik "Go" untuk menjalankan

**Atau gunakan command line:**
```bash
mysql -u root -p < "D:\Sate Taichan Lilit\db\database.sql"
# Tekan Enter tanpa memasukkan password (hanya tekan Enter)
```

### 3️⃣ Pindahkan Project ke htdocs

1. **Temukan folder htdocs** XAMPP:
   - Biasanya di: `C:\xampp\htdocs\` (atau sesuai lokasi instalasi Anda)
   
2. **Pindahkan/Copy folder project**:
   - Copy folder `Sate Taichan Lilit` ke dalam `htdocs`
   - Atau buat shortcut/junction jika ingin di lokasi berbeda

3. **Atau menggunakan Virtual Host** (optional):
   - Edit file `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
   - Tambahkan:
   ```apache
   <VirtualHost *:80>
       DocumentRoot "D:\Sate Taichan Lilit"
       ServerName sate-taican.local
   </VirtualHost>
   ```
   - Edit `C:\Windows\System32\drivers\etc\hosts`, tambahkan:
   ```
   127.0.0.1  sate-taican.local
   ```
   - Restart Apache di XAMPP

### 4️⃣ Jalankan Apache

1. **Aktifkan Apache** - Klik tombol "Start" pada Apache di XAMPP Control Panel
2. **Tunggu sampai berwarna hijau** (running)

### 5️⃣ Akses Website

**Jika file di htdocs:**
```
http://localhost/Sate%20Taichan%20Lilit/
atau
http://localhost/Sate\ Taichan\ Lilit/
```

**Jika menggunakan Virtual Host:**
```
http://sate-taican.local/
```

---

## 🔧 Konfigurasi Database

File: `config/config.php`

```php
define('DB_HOST', 'localhost');    // Host MySQL
define('DB_USER', 'root');         // Username MySQL
define('DB_PASS', '');             // Password MySQL (kosong = no password)
define('DB_NAME', 'sate_taican_db'); // Nama database
define('DB_PORT', 3306);           // Port MySQL
```

**Jika Anda mengubah password MySQL, ubah juga di file ini!**

---

## 📊 Database Schema

### Tabel yang Dibuat:

1. **bahan** - Daftar bahan-bahan
2. **alat** - Daftar peralatan
3. **fitur_produk** - Fitur produk
4. **langkah_pembuatan** - Langkah membuat sate
5. **keunggulan** - Keunggulan produk
6. **testimoni** - Testimoni pelanggan (optional)
7. **admin** - Data admin untuk login (optional)

---

## 🎨 Fitur Website

✅ **Tab Navigation** - 6 menu utama (Pengenalan, Keunggulan, Fitur, Cara, Bahan, Alat)
✅ **Responsive Design** - Rapi di desktop & mobile
✅ **Database Connected** - Siap untuk menambah data dinamis
✅ **Professional Styling** - Warna tema merah (#C41230)
✅ **Image Support** - Menampilkan gambar produk

---

## 🛠️ Tips Pengembangan

### Menambah Bahan Baru (melalui database):

```sql
INSERT INTO bahan (nama, jumlah, satuan, keterangan) 
VALUES ('Nama Bahan', 'Jumlah', 'Satuan', 'Keterangan');
```

### Membuat Admin Panel (optional):

Anda bisa membuat folder `admin/` dengan file:
- `admin/login.php` - Form login
- `admin/dashboard.php` - Dashboard admin
- `admin/edit-bahan.php` - Edit bahan
- dll

### Connect ke Database di PHP:

```php
<?php
require_once 'config/database.php';

$db = new Database();
$db->connect();

// Query data bahan
$result = $db->query("SELECT * FROM bahan");
$bahan = $db->fetch_all($result);

foreach ($bahan as $item) {
    echo $item['nama']; // Nama bahan
}
?>
```

---

## ⚠️ Troubleshooting

### Error: "Connection Error: Connection refused"
- Pastikan MySQL sudah dijalankan di XAMPP Control Panel
- Periksa konfigurasi di `config/config.php`

### Error: "Unknown database 'sate_taican_db'"
- Import file `db/database.sql` di phpMyAdmin
- Atau jalankan command line MySQL

### Gambar tidak muncul
- Pastikan file gambar ada di folder project root
- Nama file harus exact sesuai di HTML (case sensitive!)
- Pindahkan ke folder `assets/images/` dan ubah path di HTML

### Port 80 sudah dipakai
- Ubah port Apache di XAMPP Config
- Edit `C:\xampp\apache\conf\httpd.conf`, ubah `Listen 80` menjadi `Listen 8080`
- Akses via `http://localhost:8080/...`

---

## 📝 File-File Penting

| File | Fungsi |
|------|--------|
| `index.php` | Entry point utama |
| `config/config.php` | Konfigurasi aplikasi |
| `config/database.php` | Class koneksi DB |
| `db/database.sql` | SQL setup |
| `assets/css/style.css` | Styling |
| `assets/js/script.js` | JavaScript |

---

## ✨ Next Steps (Pengembangan Selanjutnya)

- [ ] Admin panel untuk manage konten
- [ ] Form testimoni pelanggan
- [ ] E-commerce (jual produk)
- [ ] Newsletter subscription
- [ ] SEO optimization
- [ ] API untuk mobile app

---

## 📞 Bantuan

Jika ada masalah:
1. Cek error log di XAMPP
2. Periksa browser console (F12 → Console)
3. Lihat phpMyAdmin untuk status database

---

**Selamat! Project Anda siap dijalankan! 🎉**

Akses website melalui: `http://localhost/Sate%20Taichan%20Lilit/`
