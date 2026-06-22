<?php
/**
 * File: KaryawanMagang.php
 * Subclass untuk Karyawan Magang (Inheritance Dasar)
 */
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti Tambahan Spesifik
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    // Konstruktor
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    // Hanya mengimplementasikan metode abstrak tanpa logika bisnis tambahan atau perkalian
    public function hitungGajiBersih() {
        return $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN MAGANG ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Uang Saku Bulanan : " . $this->uangSakuBulanan . "\n";
        echo "Sertifikat MSIB   : " . $this->sertifikatKampusMerdeka . "\n";
        echo "---------------------------------\n";
    }
}
?>