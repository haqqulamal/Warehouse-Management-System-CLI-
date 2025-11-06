<?php
/**
 * File Menu Interaktif untuk Sistem WMS
 * PT Rekayasa Manufaktur Jaya
 */

// Load semua class yang diperlukan
require_once 'classes/SparePart.php';
require_once 'classes/SparePartOtomotif.php';
require_once 'classes/SparePartElektronik.php';
require_once 'classes/SparePartHidrolik.php';
require_once 'classes/SparePartMesinProduksi.php';
require_once 'classes/SparePartAlatBerat.php';
require_once 'classes/WarehouseManagementSystem.php';

// Fungsi untuk membersihkan layar
function clearScreen() {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        system('cls');
    } else {
        system('clear');
    }
}

// Fungsi untuk pause
function pause() {
    echo "\nTekan ENTER untuk melanjutkan...";
    fgets(STDIN);
}

// Fungsi untuk input
function input($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

// Inisialisasi sistem WMS
$wms = new WarehouseManagementSystem();

// Tampilkan header
function tampilkanHeader() {
    echo "╔════════════════════════════════════════════════════╗\n";
    echo "║  SISTEM WMS PT REKAYASA MANUFAKTUR JAYA (REMAJA)  ║\n";
    echo "║          Warehouse Management System               ║\n";
    echo "╚════════════════════════════════════════════════════╝\n\n";
}

// Menu utama
function tampilkanMenu() {
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "           MENU UTAMA\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "1. Tambah Spare Part\n";
    echo "2. Lihat Semua Inventaris\n";
    echo "3. Cari Spare Part\n";
    echo "4. Update Stok\n";
    echo "5. Pindah Lokasi\n";
    echo "6. Laporan Pemeriksaan Stok\n";
    echo "7. Riwayat Transaksi\n";
    echo "8. Load Data Demo (5 spare part)\n";
    echo "0. Keluar\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
}

// Fungsi untuk memilih jenis spare part
function pilihJenisSparePart() {
    echo "\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "     PILIH JENIS SPARE PART\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "1. Spare Part Otomotif\n";
    echo "2. Spare Part Elektronik\n";
    echo "3. Spare Part Hidrolik\n";
    echo "4. Spare Part Mesin Produksi\n";
    echo "5. Spare Part Alat Berat\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    return input("Pilih jenis (1-5): ");
}

// Fungsi tambah spare part
function tambahSparePart($wms) {
    clearScreen();
    tampilkanHeader();
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "       TAMBAH SPARE PART BARU\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $jenis = pilihJenisSparePart();
    
    // Input data umum
    echo "\n--- DATA UMUM ---\n";
    $kode = input("Kode Spare Part: ");
    $nama = input("Nama Spare Part: ");
    $kategori = input("Kategori: ");
    $stok = (int)input("Jumlah Stok: ");
    $lokasi = input("Lokasi Gudang: ");
    
    $sparePart = null;
    
    switch($jenis) {
        case '1': // Otomotif
            echo "\n--- DATA SPESIFIK OTOMOTIF ---\n";
            $merkKendaraan = input("Merk Kendaraan: ");
            $tipeKendaraan = input("Tipe Kendaraan: ");
            $tahunProduksi = input("Tahun Produksi: ");
            $sparePart = new SparePartOtomotif($kode, $nama, $kategori, $stok, $lokasi, 
                                                $merkKendaraan, $tipeKendaraan, $tahunProduksi);
            break;
            
        case '2': // Elektronik
            echo "\n--- DATA SPESIFIK ELEKTRONIK ---\n";
            $voltase = input("Voltase (V): ");
            $daya = input("Daya (W): ");
            $garansi = input("Garansi (bulan): ");
            $sparePart = new SparePartElektronik($kode, $nama, $kategori, $stok, $lokasi, 
                                                  $voltase, $daya, $garansi);
            break;
            
        case '3': // Hidrolik
            echo "\n--- DATA SPESIFIK HIDROLIK ---\n";
            $tekananMaksimal = input("Tekanan Maksimal (Bar): ");
            $material = input("Material: ");
            $ukuran = input("Ukuran: ");
            $sparePart = new SparePartHidrolik($kode, $nama, $kategori, $stok, $lokasi, 
                                                $tekananMaksimal, $material, $ukuran);
            break;
            
        case '4': // Mesin Produksi
            echo "\n--- DATA SPESIFIK MESIN PRODUKSI ---\n";
            $merkMesin = input("Merk Mesin: ");
            $modelMesin = input("Model Mesin: ");
            $fungsi = input("Fungsi: ");
            $sparePart = new SparePartMesinProduksi($kode, $nama, $kategori, $stok, $lokasi, 
                                                     $merkMesin, $modelMesin, $fungsi);
            break;
            
        case '5': // Alat Berat
            echo "\n--- DATA SPESIFIK ALAT BERAT ---\n";
            $jenisAlatBerat = input("Jenis Alat Berat: ");
            $beratPart = input("Berat Part (kg): ");
            $sertifikasi = input("Sertifikasi: ");
            $sparePart = new SparePartAlatBerat($kode, $nama, $kategori, $stok, $lokasi, 
                                                 $jenisAlatBerat, $beratPart, $sertifikasi);
            break;
            
        default:
            echo "\n❌ Pilihan tidak valid!\n";
            pause();
            return;
    }
    
    if ($sparePart) {
        echo "\n" . $wms->tambahSparePart($sparePart) . "\n";
    }
    
    pause();
}

// Fungsi update stok
function updateStok($wms) {
    clearScreen();
    tampilkanHeader();
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "           UPDATE STOK\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $kode = input("Kode Spare Part: ");
    
    // Cek apakah spare part ada
    $sp = $wms->cariSparePart($kode);
    if (!$sp) {
        echo "\n❌ Spare part dengan kode {$kode} tidak ditemukan!\n";
        pause();
        return;
    }
    
    echo "\nSparePart ditemukan: {$sp->getNama()}\n";
    echo "Stok saat ini: {$sp->getStok()} unit\n\n";
    
    echo "Pilih jenis transaksi:\n";
    echo "1. Barang Masuk (+)\n";
    echo "2. Barang Keluar (-)\n";
    $jenis = input("Pilih (1/2): ");
    
    $jumlah = (int)input("Jumlah: ");
    
    if ($jenis == '2') {
        $jumlah = -$jumlah;
    }
    
    echo "\n" . $wms->updateStokSparePart($kode, $jumlah) . "\n";
    pause();
}

// Fungsi pindah lokasi
function pindahLokasi($wms) {
    clearScreen();
    tampilkanHeader();
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "         PINDAH LOKASI\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $kode = input("Kode Spare Part: ");
    
    // Cek apakah spare part ada
    $sp = $wms->cariSparePart($kode);
    if (!$sp) {
        echo "\n❌ Spare part dengan kode {$kode} tidak ditemukan!\n";
        pause();
        return;
    }
    
    echo "\nSparePart ditemukan: {$sp->getNama()}\n";
    echo "Lokasi saat ini: {$sp->getLokasi()}\n\n";
    
    $lokasiBaru = input("Lokasi baru: ");
    
    echo "\n" . $wms->pindahkanLokasi($kode, $lokasiBaru) . "\n";
    pause();
}

// Fungsi cari spare part
function cariSparePart($wms) {
    clearScreen();
    tampilkanHeader();
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "         CARI SPARE PART\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    $kode = input("Masukkan Kode Spare Part: ");
    
    $sp = $wms->cariSparePart($kode);
    
    if ($sp) {
        echo "\n" . $sp->cetakDetail() . "\n";
    } else {
        echo "\n❌ Spare part dengan kode {$kode} tidak ditemukan!\n";
    }
    
    pause();
}

// Fungsi load data demo
function loadDataDemo($wms) {
    clearScreen();
    tampilkanHeader();
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "         LOAD DATA DEMO\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
    
    echo "Loading 5 spare part demo...\n\n";
    
    $sp1 = new SparePartOtomotif("OTO-001", "Filter Oli Mesin", "Filter", 25, 
                                  "Gudang A-Rak 1", "Toyota", "Avanza", "2020-2024");
    echo $wms->tambahSparePart($sp1) . "\n";
    
    $sp2 = new SparePartElektronik("ELK-001", "Motor Listrik 3 Phase", "Motor", 12, 
                                    "Gudang B-Rak 3", "380", "5500", "12");
    echo $wms->tambahSparePart($sp2) . "\n";
    
    $sp3 = new SparePartHidrolik("HID-001", "Silinder Hidrolik", "Silinder", 7, 
                                  "Gudang A-Rak 5", "350", "Steel Chrome", "50x200mm");
    echo $wms->tambahSparePart($sp3) . "\n";
    
    $sp4 = new SparePartMesinProduksi("MSN-001", "Bearing SKF", "Bantalan", 30, 
                                       "Gudang C-Rak 2", "CNC Mill", "VMC-850", "Bantalan Poros Utama");
    echo $wms->tambahSparePart($sp4) . "\n";
    
    $sp5 = new SparePartAlatBerat("ALB-001", "Track Shoe Excavator", "Undercarriage", 4, 
                                   "Gudang D-Area Outdoor", "Excavator", "450", "ISO 9001");
    echo $wms->tambahSparePart($sp5) . "\n";
    
    echo "\n✅ Data demo berhasil dimuat!\n";
    pause();
}

// ===== PROGRAM UTAMA =====
clearScreen();

while (true) {
    clearScreen();
    tampilkanHeader();
    tampilkanMenu();
    
    $pilihan = input("Pilih menu (0-8): ");
    
    switch($pilihan) {
        case '1':
            tambahSparePart($wms);
            break;
            
        case '2':
            clearScreen();
            tampilkanHeader();
            echo $wms->tampilkanSemuaSparePart();
            pause();
            break;
            
        case '3':
            cariSparePart($wms);
            break;
            
        case '4':
            updateStok($wms);
            break;
            
        case '5':
            pindahLokasi($wms);
            break;
            
        case '6':
            clearScreen();
            tampilkanHeader();
            echo $wms->laporanStok();
            pause();
            break;
            
        case '7':
            clearScreen();
            tampilkanHeader();
            echo $wms->tampilkanRiwayat();
            pause();
            break;
            
        case '8':
            loadDataDemo($wms);
            break;
            
        case '0':
            clearScreen();
            echo "╔════════════════════════════════════════════════════╗\n";
            echo "║   TERIMA KASIH TELAH MENGGUNAKAN SISTEM WMS        ║\n";
            echo "║      PT REKAYASA MANUFAKTUR JAYA (REMAJA)          ║\n";
            echo "╚════════════════════════════════════════════════════╝\n";
            exit(0);
            
        default:
            echo "\n❌ Pilihan tidak valid!\n";
            pause();
    }
}
?>