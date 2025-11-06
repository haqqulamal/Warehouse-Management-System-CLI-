<?php
require_once 'SparePart.php';

class SparePartAlatBerat extends SparePart {
    private $jenisAlatBerat;
    private $beratPart;
    private $sertifikasi;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi, $jenisAlatBerat, $beratPart, $sertifikasi) {
        parent::__construct($kode, $nama, $kategori, $stok, $lokasi);
        $this->jenisAlatBerat = $jenisAlatBerat;
        $this->beratPart = $beratPart;
        $this->sertifikasi = $sertifikasi;
    }
    
    public function cetakDetail() {
        return "=== SPARE PART ALAT BERAT ===\n" .
               "Kode: {$this->kode}\n" .
               "Nama: {$this->nama}\n" .
               "Kategori: {$this->kategori}\n" .
               "Stok: {$this->stok} unit\n" .
               "Lokasi: {$this->lokasi}\n" .
               "Jenis Alat Berat: {$this->jenisAlatBerat}\n" .
               "Berat Part: {$this->beratPart} kg\n" .
               "Sertifikasi: {$this->sertifikasi}\n" .
               "Tanggal Masuk: {$this->tanggalMasuk}\n";
    }
    
    public function periksaStok() {
        if ($this->stok < 3) {
            return "🚨 KRITIS: Stok spare part alat berat {$this->nama} sangat rendah! Sisa: {$this->stok} unit";
        }
        return "✅ Stok spare part alat berat {$this->nama} mencukupi: {$this->stok} unit";
    }
}
?>