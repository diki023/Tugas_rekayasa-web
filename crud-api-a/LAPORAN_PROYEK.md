# Laporan Dokumentasi Proyek `crud-api-a`

## 1. Pendahuluan
Proyek `crud-api-a` adalah sebuah aplikasi backend berbasis RESTful API yang dibangun menggunakan framework **Lumen**, sebuah micro-framework dari Laravel yang dikhususkan untuk pembuatan API yang cepat dan ringan. Aplikasi ini menyediakan layanan manajemen data untuk sistem sekolah sederhana, mencakup pengelolaan data Siswa, Guru, dan Kelas, serta dilengkapi dengan sistem autentikasi menggunakan **JWT (JSON Web Token)**.

## 2. Persyaratan Sistem
Sebelum menjalankan aplikasi, pastikan lingkungan pengembangan Anda memenuhi persyaratan berikut:
- **PHP**: Versi 8.1 atau lebih baru
- **Composer**: Untuk manajemen dependensi
- **Database**: MySQL/MariaDB (atau database sql lainnya yang didukung Laravel)

## 3. Struktur Proyek
Berikut adalah struktur direktori utama proyek:
- `app/Http/Controllers`: Berisi logika bisnis (Controller) untuk Auth, Siswa, Guru, dan Kelas.
- `app/Models`: Definisi model database (User, Siswa, Guru, Kelas).
- `routes/web.php`: Definisi routing API.
- `database/migrations`: File migrasi untuk struktur database.

## 4. Instalasi dan Konfigurasi
Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini:

1.  **Clone atau Ekstrak Proyek** ke direktori kerja Anda.
2.  **Install Dependensi** dengan menjalankan perintah:
    ```bash
    composer install
    ```
3.  **Konfigurasi Environment**:
    - Salin file `.env.example` menjadi `.env`.
    - Atur koneksi database di file `.env` (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    - Generate APP_KEY (jika belum ada):
      ```bash
      php artisan key:generate
      ```
4.  **Menjalankan Migrasi Database**:
    ```bash
    php artisan migrate
    ```
5.  **Menjalankan Server**:
    ```bash
    php -S localhost:8000 -t public
    ```

## 5. Struktur Database
Aplikasi ini menggunakan 4 tabel utama:

### 1. `users` (Tabel Pengguna)
Digunakan untuk autentikasi sistem.
- `id`: Primary Key (Auto Increment)
- `name`: Nama pengguna (String)
- `email`: Email pengguna (String, Unique)
- `password`: Kata sandi terenkripsi (String)
- `timestamps`: created_at, updated_at

### 2. `siswas` (Tabel Siswa)
Menyimpan data siswa.
- `id`: Primary Key
- `nama`: Nama siswa (String, 100)
- `umur`: Umur siswa (Integer)
- `alamat`: Alamat siswa (String, 255)
- `timestamps`

### 3. `gurus` (Tabel Guru)
Menyimpan data guru.
- `id`: Primary Key
- `nama`: Nama guru (String, 100)
- `mata_pelajaran`: Mata pelajaran yang diampu (String, 100)
- `pengalaman_tahun`: Lama pengalaman mengajar dalam tahun (Integer)
- `timestamps`

### 4. `kelas` (Tabel Kelas)
Menyimpan data kelas.
- `id`: Primary Key
- `nama_kelas`: Nama kelas (String, 50, contoh: "X-IPA-1")
- `tingkat`: Tingkat kelas (String, 50)
- `jumlah_siswa`: Kapasitas atau jumlah siswa saat ini (Integer)
- `timestamps`

## 6. Dokumentasi API
Semua endpoint berada di bawah prefix `/api`.

### Autentikasi (Auth)
Keamanan menggunakan JWT Auth.

| Method | Endpoint | Deskripsi | Parameter Body |
| :--- | :--- | :--- | :--- |
| POST | `/api/login` | Masuk aplikasi & dapatkan Token | `email`, `password` |
| POST | `/api/user-profile` | Mendapatkan data user yang sedang login | *(Membutuhkan Authorization Bearer Token)* |
| POST | `/api/refresh` | Refresh token yang kadaluwarsa | *(Membutuhkan Authorization Bearer Token)* |
| POST | `/api/logout` | Keluar aplikasi (Invalidasi token) | *(Membutuhkan Authorization Bearer Token)* |

---

### Manajemen Siswa (Siswa)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| **GET** | `/api/siswa/read` | Mengambil semua data siswa |
| **POST** | `/api/siswa/create` | Menambah data siswa baru <br> *Body: `nama`, `umur`, `alamat`* |
| **PUT** | `/api/siswa/update/{id}` | Mengupdate data siswa berdasarkan ID <br> *Body: `nama`, `umur`, `alamat`* |
| **DELETE** | `/api/siswa/delete/{id}` | Menghapus siswa berdasarkan ID |

---

### Manajemen Guru (Guru)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| **GET** | `/api/guru/read` | Mengambil semua data guru |
| **POST** | `/api/guru/create` | Menambah data guru baru <br> *Body: `nama`, `mata_pelajaran`, `pengalaman_tahun`* |
| **PUT** | `/api/guru/update/{id}` | Mengupdate data guru berdasarkan ID |
| **DELETE** | `/api/guru/delete/{id}` | Menghapus guru berdasarkan ID |

---

### Manajemen Kelas (Kelas)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| **GET** | `/api/kelas/read` | Mengambil semua data kelas |
| **POST** | `/api/kelas/create` | Menambah data kelas baru <br> *Body: `nama_kelas`, `tingkat`, `jumlah_siswa`* |
| **PUT** | `/api/kelas/update/{id}` | Mengupdate data kelas berdasarkan ID |
| **DELETE** | `/api/kelas/delete/{id}` | Menghapus kelas berdasarkan ID |

## 7. Penutup
Dokumentasi ini mencakup aspek teknis utama dari API `crud-api-a`. Aplikasi ini dirancang modular sehingga mudah untuk dikembangkan lebih lanjut, misalnya dengan menambahkan relasi antar tabel (seperti menghubungkan Siswa ke Kelas) atau menambahkan validasi input yang lebih kompleks.
