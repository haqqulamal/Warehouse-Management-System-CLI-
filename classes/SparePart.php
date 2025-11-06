<?php
/**
 * Parent Class untuk semua jenis Spare Part
 * Menerapkan konsep Inheritance
 */

abstract class SparePart {
    protected $kode;
    protected $nama;
    protected $kategori;
    protected $stok;
    protected $lokasi;
    protected $tanggalMasuk;
    
    public function __construct($kode, $nama, $kategori, $stok, $lokasi) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->stok = $stok;
        $this->lokasi = $lokasi;
        $this->tanggalMasuk = date('Y-m-d H:i:s');
    }
    
    // Getter methods
    public function getKode() {
        return $this->kode;
    }
    
    public function getNama() {
        return $this->nama;
    }
    
    public function getKategori() {
        return $this->kategori;
    }
    
    public function getStok() {
        return $this->stok;
    }
    
    public function getLokasi() {
        return $this->lokasi;
    }
    
    public function getTanggalMasuk() {
        return $this->tanggalMasuk;
    }
    
    // Method untuk update stok
    public function updateStok($jumlah) {
        $this->stok += $jumlah;
        return $this->stok;
    }
    
    public function setLokasi($lokasi) {
        $this->lokasi = $lokasi;
    }
    
    // Abstract method untuk polymorphism
    abstract public function cetakDetail();
    abstract public function periksaStok();
}
?>