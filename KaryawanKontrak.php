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

    // Method Overriding: Hitung Gaji Bersih
    // Rumus: Hari Kerja * Gaji Dasar Per Hari
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari; 
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN KONTRAK ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Hari Kerja Masuk  : " . $this->hariKerjaMasuk . " Hari\n";
        echo "Durasi Kontrak    : " . $this->durasiKontrakBulan . " Bulan\n";
        echo "Agensi Penyalur   : " . $this->agensiPenyalur . "\n";
        echo "Gaji Bersih       : Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "\n";
        echo "---------------------------------\n";
    }
}
?>