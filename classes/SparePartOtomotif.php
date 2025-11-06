<?php
require_once 'SparePart.php';

class SparePartOtomotif extends SparePart {
    private $merkKendaraan;
    private $tipeKendaraan;
    private $tahunProduksi;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi, $merkKendaraan, $tipeKendaraan, $tahunProduksi) {
        parent::__construct($kode, $nama, $kategori, $stok, $lokasi);
        $this->merkKendaraan = $merkKendaraan;
        $this->tipeKendaraan = $tipeKendaraan;
        $this->tahunProduksi = $tahunProduksi;
    }
    
    public function cetakDetail() {
        return "=== SPARE PART OTOMOTIF ===\n" .
               "Kode: {$this->kode}\n" .
               "Nama: {$this->nama}\n" .
               "Kategori: {$this->kategori}\n" .
               "Stok: {$this->stok} unit\n" .
               "Lokasi: {$this->lokasi}\n" .
               "Merk Kendaraan: {$this->merkKendaraan}\n" .
               "Tipe Kendaraan: {$this->tipeKendaraan}\n" .
               "Tahun Produksi: {$this->tahunProduksi}\n" .
               "Tanggal Masuk: {$this->tanggalMasuk}\n";
    }
    
    public function periksaStok() {
        if ($this->stok < 10) {
            return "⚠️  PERINGATAN: Stok spare part otomotif {$this->nama} rendah! Sisa: {$this->stok} unit";
        }
        return "✅ Stok spare part otomotif {$this->nama} mencukupi: {$this->stok} unit";
    }
}
?>