<?php
require_once 'SparePart.php';

class SparePartHidrolik extends SparePart {
    private $tekananMaksimal;
    private $material;
    private $ukuran;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi, $tekananMaksimal, $material, $ukuran) {
        parent::__construct($kode, $nama, $kategori, $stok, $lokasi);
        $this->tekananMaksimal = $tekananMaksimal;
        $this->material = $material;
        $this->ukuran = $ukuran;
    }
    
    public function cetakDetail() {
        return "=== SPARE PART HIDROLIK ===\n" .
               "Kode: {$this->kode}\n" .
               "Nama: {$this->nama}\n" .
               "Kategori: {$this->kategori}\n" .
               "Stok: {$this->stok} unit\n" .
               "Lokasi: {$this->lokasi}\n" .
               "Tekanan Maksimal: {$this->tekananMaksimal} Bar\n" .
               "Material: {$this->material}\n" .
               "Ukuran: {$this->ukuran}\n" .
               "Tanggal Masuk: {$this->tanggalMasuk}\n";
    }
    
    public function periksaStok() {
        if ($this->stok < 8) {
            return "⚠️  PERINGATAN: Stok spare part hidrolik {$this->nama} rendah! Sisa: {$this->stok} unit";
        }
        return "✅ Stok spare part hidrolik {$this->nama} mencukupi: {$this->stok} unit";
    }
}
?>