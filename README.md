# Warehouse Management System (WMS) CLI

Aplikasi ini merupakan simulasi Warehouse Management System (WMS) berbasis PHP CLI yang digunakan untuk mengelola inventaris spare part untuk PT Rekayasa Manufaktur Jaya (REMAJA). Terdapat menu interaktif untuk menambah spare part, melihat inventaris, memindahkan lokasi, hingga menampilkan riwayat transaksi.

## Fitur Utama
- Input data spare part baru untuk lima kategori berbeda.
- Pencarian cepat berdasarkan kode spare part.
- Update stok masuk atau keluar sekaligus pencatatan riwayat transaksi.
- Pemindahan lokasi penyimpanan spare part.
- Laporan pemeriksaan stok dan riwayat transaksi terbaru.
- Mode demo untuk memuat 5 data contoh secara otomatis.

## Prasyarat
- PHP 8.0 atau versi lebih baru dengan dukungan CLI (`php -v`).
- Terminal (Command Prompt, PowerShell, bash, dsb).
- Git (opsional) untuk cloning repository.

## Struktur Proyek
```
.
+-- classes/
|   +-- SparePart.php
|   +-- SparePartOtomotif.php
|   +-- SparePartElektronik.php
|   +-- SparePartHidrolik.php
|   +-- SparePartMesinProduksi.php
|   +-- SparePartAlatBerat.php
|   +-- WarehouseManagementSystem.php
+-- index.php
+-- menu.php
```

## Menjalankan Menu Interaktif
1. Buka terminal dan masuk ke direktori proyek.
   ```bash
   cd wms-remaja
   ```
2. Jalankan program menu interaktif.
   ```bash
   php menu.php
   ```
3. Menu utama akan muncul seperti berikut.
   ```text
   MENU UTAMA
   1. Tambah Spare Part
   2. Lihat Semua Inventaris
   3. Cari Spare Part
   4. Update Stok
   5. Pindah Lokasi
   6. Laporan Pemeriksaan Stok
   7. Riwayat Transaksi
   8. Load Data Demo (5 spare part)
   0. Keluar
   ```
4. Ikuti petunjuk pada layar untuk memasukkan data. Contoh alur penambahan spare part otomotif:
   ```text
   Pilih menu (0-8): 1
   Pilih jenis (1-5): 1
   Kode Spare Part: OTO-105
   Nama Spare Part: Kampas Rem Depan
   Kategori: Sistem Rem
   Jumlah Stok: 40
   Lokasi Gudang: Gudang A-Rak 2
   Merk Kendaraan: Honda
   Tipe Kendaraan: HR-V
   Tahun Produksi: 2020-2024
   ```
5. Setelah menyelesaikan satu aksi, tekan ENTER untuk kembali ke menu utama.

## Mode Demo Otomatis
Jika ingin langsung mencoba tanpa input manual panjang, pilih opsi `8` pada menu untuk memuat 5 spare part contoh. Setelah itu Anda dapat mencoba menu lain seperti laporan stok atau riwayat transaksi.

## Skrip Index (Opsional)
File `index.php` menjalankan skenario demo otomatis yang sama seperti mode menu, namun tanpa interaksi pengguna. Jalankan:
```bash
php index.php
```

## Tips Penggunaan
- Pastikan kode spare part unik agar tidak menimpa data yang sudah ada.
- Gunakan pencarian (`menu 3`) untuk memastikan data sudah tersimpan dengan benar.
- Laporan stok (`menu 6`) membantu melakukan audit cepat sebelum transaksi.

## Troubleshooting
- **Perintah `php` tidak dikenali**: pastikan PHP CLI sudah terpasang dan path PHP sudah ditambahkan ke `PATH`.
- **Karakter garis menu rusak di terminal**: gunakan terminal dengan dukungan UTF-8 atau ganti font ke Consolas/DejaVu Sans Mono.
- **Data hilang setelah menutup program**: aplikasi ini menyimpan data di memori (runtime). Implementasikan penyimpanan eksternal jika diperlukan.
