<?php
/**
 * File: KaryawanKontrak.php
 * Subclass untuk Karyawan Kontrak (Inheritance Dasar)
 */
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti Tambahan Spesifik
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Konstruktor
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $durasi, $agensi) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->durasiKontrakBulan = $durasi;
        $this->agensiPenyalur = $agensi;
    }

    // Hanya mengimplementasikan metode abstrak tanpa logika bisnis tambahan
    public function hitungGajiBersih() {
        return $this->gajiDasarPerHari; 
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN KONTRAK ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Durasi Kontrak    : " . $this->durasiKontrakBulan . " Bulan\n";
        echo "Agensi Penyalur   : " . $this->agensiPenyalur . "\n";
        echo "---------------------------------\n";
    }
}
?>