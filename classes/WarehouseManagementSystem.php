<?php
/**
 * Class utama untuk mengelola Warehouse Management System
 */

class WarehouseManagementSystem {
    private $inventaris = [];
    private $riwayatTransaksi = [];
    
    public function tambahSparePart(SparePart $sparePart) {
        $this->inventaris[$sparePart->getKode()] = $sparePart;
        $this->catatTransaksi("TAMBAH", $sparePart->getKode(), $sparePart->getStok());
        return "✅ Spare part {$sparePart->getNama()} berhasil ditambahkan ke inventaris.";
    }
    
    public function cariSparePart($kode) {
        if (isset($this->inventaris[$kode])) {
            return $this->inventaris[$kode];
        }
        return null;
    }
    
    public function tampilkanSemuaSparePart() {
        if (empty($this->inventaris)) {
            return "❌ Inventaris kosong.";
        }
        
        $output =  "╔════════════════════════════════════════╗\n";
        $output .= "║   DAFTAR INVENTARIS SPARE PART         ║\n";
        $output .= "╚════════════════════════════════════════╝\n\n";
        
        foreach ($this->inventaris as $sparePart) {
            $output .= $sparePart->cetakDetail() . "\n";
        }
        return $output;
    }
    
    public function updateStokSparePart($kode, $jumlah) {
        $sparePart = $this->cariSparePart($kode);
        if ($sparePart) {
            $stokBaru = $sparePart->updateStok($jumlah);
            $this->catatTransaksi($jumlah > 0 ? "MASUK" : "KELUAR", $kode, abs($jumlah));
            return "✅ Stok berhasil diupdate. Stok sekarang: {$stokBaru} unit";
        }
        return "❌ Spare part dengan kode {$kode} tidak ditemukan.";
    }
    
    public function pindahkanLokasi($kode, $lokasiBaru) {
        $sparePart = $this->cariSparePart($kode);
        if ($sparePart) {
            $lokasiLama = $sparePart->getLokasi();
            $sparePart->setLokasi($lokasiBaru);
            $this->catatTransaksi("PINDAH", $kode, 0, "Dari {$lokasiLama} ke {$lokasiBaru}");
            return "✅ Lokasi spare part berhasil dipindahkan dari {$lokasiLama} ke {$lokasiBaru}.";
        }
        return "❌ Spare part dengan kode {$kode} tidak ditemukan.";
    }
    
    public function laporanStok() {
        if (empty($this->inventaris)) {
            return "❌ Tidak ada data untuk laporan.";
        }
        
        $output =  "╔════════════════════════════════════════╗\n";
        $output .= "║     LAPORAN PEMERIKSAAN STOK           ║\n";
        $output .= "╚════════════════════════════════════════╝\n";
        $output .= "Tanggal: " . date('d-m-Y H:i:s') . "\n\n";
        
        foreach ($this->inventaris as $sparePart) {
            $output .= $sparePart->periksaStok() . "\n";
        }
        
        return $output;
    }
    
    public function cariByKategori($kategori) {
        $hasil = [];
        foreach ($this->inventaris as $sparePart) {
            if (stripos($sparePart->getKategori(), $kategori) !== false) {
                $hasil[] = $sparePart;
            }
        }
        return $hasil;
    }
    
    private function catatTransaksi($jenis, $kode, $jumlah, $keterangan = "") {
        $this->riwayatTransaksi[] = [
            'tanggal' => date('Y-m-d H:i:s'),
            'jenis' => $jenis,
            'kode' => $kode,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan
        ];
    }
    
    public function tampilkanRiwayat($limit = 10) {
        $output =  "╔════════════════════════════════════════╗\n";
        $output .= "║       RIWAYAT TRANSAKSI                ║\n";
        $output .= "╚════════════════════════════════════════╝\n\n";
        
        if (empty($this->riwayatTransaksi)) {
            return $output . "Belum ada transaksi.\n";
        }
        
        $transaksi = array_slice(array_reverse($this->riwayatTransaksi), 0, $limit);
        
        foreach ($transaksi as $t) {
            $output .= "[{$t['tanggal']}] {$t['jenis']} - Kode: {$t['kode']} - Jumlah: {$t['jumlah']}";
            if ($t['keterangan']) {
                $output .= " - {$t['keterangan']}";
            }
            $output .= "\n";
        }
        
        return $output;
    }
    
    public function getJumlahInventaris() {
        return count($this->inventaris);
    }
}
?>