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

    // Method Overriding: Hitung Gaji Bersih
    // Rumus: (Hari Kerja * Gaji Dasar) + Tunjangan Kesehatan
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN TETAP ===\n";
        echo "ID Karyawan       : " . $this->id_karyawan . "\n";
        echo "Nama              : " . $this->nama_karyawan . "\n";
        echo "Departemen        : " . $this->departemen . "\n";
        echo "Hari Kerja Masuk  : " . $this->hariKerjaMasuk . " Hari\n";
        echo "Tunjangan Kes.    : " . $this->tunjanganKesehatan . "\n";
        echo "Opsi Saham ID     : " . $this->opsiSahamId . "\n";
        echo "Gaji Bersih       : Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "\n";
        echo "---------------------------------\n";
    }
}
?>