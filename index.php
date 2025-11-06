<?php
/**
 * File Utama untuk Menjalankan Sistem WMS
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

echo "╔════════════════════════════════════════════════════╗\n";
echo "║  SISTEM WMS PT REKAYASA MANUFAKTUR JAYA (REMAJA)   ║\n";
echo "║          Warehouse Management System               ║\n";
echo "╚════════════════════════════════════════════════════╝\n\n";

// Inisialisasi sistem WMS
$wms = new WarehouseManagementSystem();

echo "📦 Menginisialisasi sistem...\n\n";

// ===== TAMBAH DATA SPARE PART =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  MENAMBAHKAN DATA SPARE PART\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

$sp1 = new SparePartOtomotif(
    "OTO-001", 
    "Filter Oli Mesin", 
    "Filter", 
    25, 
    "Gudang A-Rak 1", 
    "Toyota", 
    "Avanza", 
    "2020-2024"
);

$sp2 = new SparePartElektronik(
    "ELK-001", 
    "Motor Listrik 3 Phase", 
    "Motor", 
    12, 
    "Gudang B-Rak 3", 
    "380", 
    "5500", 
    "12"
);

$sp3 = new SparePartHidrolik(
    "HID-001", 
    "Silinder Hidrolik", 
    "Silinder", 
    7, 
    "Gudang A-Rak 5", 
    "350", 
    "Steel Chrome", 
    "50x200mm"
);

$sp4 = new SparePartMesinProduksi(
    "MSN-001", 
    "Bearing SKF", 
    "Bantalan", 
    30, 
    "Gudang C-Rak 2", 
    "CNC Mill", 
    "VMC-850", 
    "Bantalan Poros Utama"
);

$sp5 = new SparePartAlatBerat(
    "ALB-001", 
    "Track Shoe Excavator", 
    "Undercarriage", 
    4, 
    "Gudang D-Area Outdoor", 
    "Excavator", 
    "450", 
    "ISO 9001"
);

echo $wms->tambahSparePart($sp1) . "\n";
echo $wms->tambahSparePart($sp2) . "\n";
echo $wms->tambahSparePart($sp3) . "\n";
echo $wms->tambahSparePart($sp4) . "\n";
echo $wms->tambahSparePart($sp5) . "\n\n";

// ===== TAMPILKAN SEMUA INVENTARIS =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  MENAMPILKAN INVENTARIS\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo $wms->tampilkanSemuaSparePart() . "\n";

// ===== UPDATE STOK =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  UPDATE STOK SPARE PART\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo "📤 Barang keluar...\n";
echo $wms->updateStokSparePart("OTO-001", -5) . "\n\n";
echo "📥 Barang masuk...\n";
echo $wms->updateStokSparePart("ELK-001", 10) . "\n\n";

// ===== PINDAH LOKASI =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  PINDAH LOKASI SPARE PART\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo $wms->pindahkanLokasi("HID-001", "Gudang B-Rak 1") . "\n\n";

// ===== LAPORAN STOK (POLYMORPHISM) =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  LAPORAN PEMERIKSAAN STOK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo $wms->laporanStok() . "\n";

// ===== DETAIL SPARE PART TERTENTU =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  DETAIL SPARE PART SPESIFIK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
$cari = $wms->cariSparePart("MSN-001");
if ($cari) {
    echo $cari->cetakDetail() . "\n";
}

// ===== RIWAYAT TRANSAKSI =====
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  RIWAYAT TRANSAKSI TERAKHIR\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";
echo $wms->tampilkanRiwayat() . "\n";

// ===== SUMMARY =====
echo "╔════════════════════════════════════════════════════╗\n";
echo "║              SUMMARY SISTEM                        ║\n";
echo "╚════════════════════════════════════════════════════╝\n";
echo "Total Spare Part: " . $wms->getJumlahInventaris() . " jenis\n";
echo "Status: ✅ Sistem berjalan dengan baik\n";
echo "\n╔════════════════════════════════════════════════════╗\n";
echo "║        TERIMA KASIH TELAH MENGGUNAKAN WMS          ║\n";
echo "║           PT REKAYASA MANUFAKTUR JAYA              ║\n";
echo "╚════════════════════════════════════════════════════╝\n";
?>