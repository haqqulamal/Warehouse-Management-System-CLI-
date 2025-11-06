<?php
require_once 'SparePart.php';

class SparePartMesinProduksi extends SparePart {
    private $merkMesin;
    private $modelMesin;
    private $fungsi;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi, $merkMesin, $modelMesin, $fungsi) {
        parent::__construct($kode, $nama, $kategori, $stok, $lokasi);
        $this->merkMesin = $merkMesin;
        $this->modelMesin = $modelMesin;
        $this->fungsi = $fungsi;
    }
    
    public function cetakDetail() {
        return "=== SPARE PART MESIN PRODUKSI ===\n" .
               "Kode: {$this->kode}\n" .
               "Nama: {$this->nama}\n" .
               "Kategori: {$this->kategori}\n" .
               "Stok: {$this->stok} unit\n" .
               "Lokasi: {$this->lokasi}\n" .
               "Merk Mesin: {$this->merkMesin}\n" .
               "Model Mesin: {$this->modelMesin}\n" .
               "Fungsi: {$this->fungsi}\n" .
               "Tanggal Masuk: {$this->tanggalMasuk}\n";
    }
    
    public function periksaStok() {
        if ($this->stok < 5) {
            return "🚨 KRITIS: Stok spare part mesin produksi {$this->nama} sangat rendah! Sisa: {$this->stok} unit";
        }
        return "✅ Stok spare part mesin produksi {$this->nama} mencukupi: {$this->stok} unit";
    }
}
?>