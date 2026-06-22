<?php
/**
 * Abstract Class Karyawan
 * Menggunakan konsep OOP di PHP (Encapsulation & Abstraction)
 */
abstract class Karyawan {
    // Properti/Atribut Terenkapsulasi (Protected)
    // Atribut ini hanya bisa diakses oleh class ini sendiri dan class turunannya (children)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    // Konstruktor untuk menginisialisasi atribut global saat objek anak dibuat
    public function __construct($id, $nama, $dept, $hariKerja, $gajiDasar) {
        $this->id_karyawan = $id;
        $this->nama_karyawan = $nama;
        $this->departemen = $dept;
        $this->hariKerjaMasuk = $hariKerja;
        $this->gajiDasarPerHari = $gajiDasar;
    }

    // Metode Abstrak (Tanpa Body/Isi)
    // Wajib diimplementasikan secara spesifik oleh setiap class anak (turunan)
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}
?>