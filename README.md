# Todo List - CodeIgniter 4

## 📌 Deskripsi Proyek

Proyek ini adalah aplikasi Todo List sederhana yang dibuat menggunakan CodeIgniter 4. Aplikasi ini memungkinkan pengguna untuk mengelola daftar tugas dengan kategori tertentu.

## 🛠️ Teknologi yang Digunakan

- **CodeIgniter 4** - Framework PHP
- **Bootstrap 5.3.3** - Untuk tampilan UI
- **jQuery** - Untuk manipulasi DOM
- **SweetAlert2** - Untuk notifikasi dan konfirmasi
- **DataTables (datatables.net-bs5)** - Untuk menampilkan data dalam bentuk tabel interaktif

## 📂 Struktur Database

Aplikasi ini menggunakan dua tabel utama:

### 1. **Tabel `categories`**

Digunakan untuk menyimpan kategori tugas.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
name (VARCHAR 100, NOT NULL)
created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
```

### 2. **Tabel `tasks`**

Digunakan untuk menyimpan daftar tugas.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
title (VARCHAR 255, NOT NULL)
description (TEXT, NULL)
due_date (DATE, NOT NULL)
status (ENUM('Belum Selesai', 'Selesai'), DEFAULT 'Belum Selesai')
category_id (INT, NULL, FOREIGN KEY ke categories.id)
created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
```

## ⚙️ Instalasi & Konfigurasi

1. **Clone repositori ini**
   `sh
 git clone https://github.com/username/todo-list-ci4.git
 cd todo-list-ci4
 `
2. **Install dependencies dengan Composer**
   `sh
composer install
`
3. **Konfigurasi `.env`**
   - Ubah nama file `.env.example` menjadi `.env`
   - Sesuaikan konfigurasi database:
     `ini
database.default.hostname = localhost
database.default.database = nama_database
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
`
4. **Jalankan migrasi database**
   `sh
php spark migrate
`
5. **Jalankan seeder untuk mengisi data awal**
   `sh
php spark db:seed DatabaseSeeder
`
6. **Jalankan aplikasi**
   `sh
php spark serve
`
7. **Akses melalui browser**
   `
http://localhost:8080`

## ✨ Fitur

- Menambah, mengedit, dan menghapus tugas
- Menyaring tugas berdasarkan kategori
- Mengubah status tugas (Belum Selesai / Selesai)
- Notifikasi menggunakan SweetAlert2
- Tabel interaktif dengan DataTables

## 🖼️ Tampilan Aplikasi

Aplikasi ini menggunakan Bootstrap 5 untuk tampilan modern dan responsif.

## 📜 Lisensi

Proyek ini bersifat open-source dan bebas digunakan.

---

🚀 **Selamat mengembangkan!**
