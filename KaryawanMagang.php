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

    // Method Overriding: Hitung Gaji Bersih
    // Rumus: (Hari Kerja * Gaji Dasar) * 0.80 (Potongan 20%)
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN MAGANG ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Hari Kerja Masuk  : " . $this->hariKerjaMasuk . " Hari\n";
        echo "Sertifikat MSIB   : " . ($this->sertifikatKampusMerdeka ? $this->sertifikatKampusMerdeka : "Tidak Ada") . "\n";
        echo "Catatan Potongan  : 20% Biaya Program Orientasi/Pelatihan\n";
        echo "Gaji Bersih       : Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "\n";
        echo "---------------------------------\n";
    }
}
?>