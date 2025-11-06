<?php
require_once 'SparePart.php';

class SparePartElektronik extends SparePart {
    private $voltase;
    private $daya;
    private $garansi;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi, $voltase, $daya, $garansi) {
        parent::__construct($kode, $nama, $kategori, $stok, $lokasi);
        $this->voltase = $voltase;
        $this->daya = $daya;
        $this->garansi = $garansi;
    }
    
    public function cetakDetail() {
        return "=== SPARE PART ELEKTRONIK ===\n" .
               "Kode: {$this->kode}\n" .
               "Nama: {$this->nama}\n" .
               "Kategori: {$this->kategori}\n" .
               "Stok: {$this->stok} unit\n" .
               "Lokasi: {$this->lokasi}\n" .
               "Voltase: {$this->voltase}V\n" .
               "Daya: {$this->daya}W\n" .
               "Garansi: {$this->garansi} bulan\n" .
               "Tanggal Masuk: {$this->tanggalMasuk}\n";
    }
    
    public function periksaStok() {
        if ($this->stok < 15) {
            return "⚠️  PERINGATAN: Stok spare part elektronik {$this->nama} rendah! Sisa: {$this->stok} unit";
        }
        return "✅ Stok spare part elektronik {$this->nama} mencukupi: {$this->stok} unit";
    }
}
?>