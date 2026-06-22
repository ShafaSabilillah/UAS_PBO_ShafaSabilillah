<?php
/**
 * Nama Basis Data: DB_UAS_PBO_TI1C_ShafaSabilillah
 * Pendekatan: Object-Oriented Programming (OOP) Basic menggunakan MySQLi
 */

class DatabaseConnection {
    // Properti class untuk menyimpan konfigurasi basis data
    private $host     = "localhost";
    private $username = "root"; // Silakan sesuaikan dengan konfigurasi server Anda
    private $password = "";     // Silakan sesuaikan dengan konfigurasi server Anda
    private $database = "DB_UAS_PBO_TI1C_ShafaSabilillah";
    private $conn;

    // Konstruktor: Otomatis berjalan saat objek diinstansiasi
    public function __construct() {
        $this->connect();
    }

    // Method internal untuk membangun koneksi
    private function connect() {
        // Membuat instance/objek baru dari class bawaan PHP 'mysqli'
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah terjadi error pada koneksi
        if ($this->conn->connect_error) {
            die("Koneksi basis data gagal: " . $this->conn->connect_error);
        }
    }

    // Method untuk mengambil instance koneksi (Getter)
    public function getConnection() {
        return $this->conn;
    }

    // Destruktor: Otomatis menutup koneksi ketika script selesai dieksekusi
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

// =========================================================================
// Cara Penggunaan / Inisialisasi Objek Koneksi
// =========================================================================
$db = new DatabaseConnection();
$koneksi = $db->getConnection();

// Kode uji coba (Bisa Anda hapus atau komentari jika file ini digabung ke program utama)
if ($koneksi) {
    echo "Koneksi ke basis data DB_UAS_PBO_TI1C_ShafaSabilillah berhasil menggunakan OOP!";
}
?>