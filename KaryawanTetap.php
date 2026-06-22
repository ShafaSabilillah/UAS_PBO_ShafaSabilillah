<?php
/**
 * File: KaryawanTetap.php
 * Subclass untuk Karyawan Tetap (Inheritance Dasar)
 */
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti Tambahan Spesifik
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Konstruktor
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar, $tunjangan, $sahamId) {
        parent::__construct($id, $nama, $dept, $hariKerja, $gajiDasar);
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    // Hanya mengimplementasikan metode abstrak tanpa logika bisnis tambahan
    public function hitungGajiBersih() {
        return $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN TETAP ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Tunjangan Kes.    : " . $this->tunjanganKesehatan . "\n";
        echo "Opsi Saham ID     : " . $this->opsiSahamId . "\n";
        echo "---------------------------------\n";
    }
}
?>