<?php
// Mengimport seluruh class yang dibutuhkan
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

// Menyiapkan array penampung untuk pengelompokan objek karyawan
$daftar_tetap = [];
$daftar_kontrak = [];
$daftar_magang = [];

try {
    // Mengambil koneksi database dari objek DatabaseConnection
    $db = new DatabaseConnection();
    $koneksi = $db->getConnection();

    // Query untuk mengambil seluruh data dari tabel_karyawan
    $query = "SELECT * FROM tabel_karyawan";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Mengonversi data database menjadi objek class konkrit
            switch ($row['jenis_karyawan']) {
                case 'Tetap':
                    $daftar_tetap[] = new KaryawanTetap(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['tunjangan_kesehatan'], $row['opsi_saham_id']
                    );
                    break;
                case 'Kontrak':
                    $daftar_kontrak[] = new KaryawanKontrak(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                    );
                    break;
                case 'Magang':
                    $daftar_magang[] = new KaryawanMagang(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                    );
                    break;
            }
        }
    }
} catch (Exception $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}

// Fungsi helper view untuk merender baris tabel objek karyawan secara polimorfis
function renderTableKaryawan($daftar_karyawan, $jenis) {
    if (empty($daftar_karyawan)) {
        echo "<tr><td colspan='7' class='text-center text-muted py-3'>Tidak ada data karyawan kategori ini.</td></tr>";
        return;
    }

    foreach ($daftar_karyawan as $k) {
        // Menggunakan Reflection Class untuk membaca properti terenkapsulasi demi kebutuhan View harian
        $ref = new ReflectionClass($k);
        $id = $ref->getProperty('id_karyawan'); $id->setAccessible(true);
        $nama = $ref->getProperty('nama_karyawan'); $nama->setAccessible(true);
        $dept = $ref->getProperty('departemen'); $dept->setAccessible(true);
        $hari = $ref->getProperty('hariKerjaMasuk'); $hari->setAccessible(true);
        $gaji = $ref->getProperty('gajiDasarPerHari'); $gaji->setAccessible(true);

        echo "<tr>";
        echo "<td><strong>" . $id->getValue($k) . "</strong></td>";
        echo "<td>" . $nama->getValue($k) . "</td>";
        echo "<td>" . $dept->getValue($k) . "</td>";
        echo "<td class='text-center'>" . $hari->getValue($k) . " Hari</td>";
        echo "<td>Rp " . number_format($gaji->getValue($k), 2, ',', '.') . "</td>";
        
        // Menampilkan Atribut Spesifik (Jabatan) berdasarkan Kategori
        echo "<td><small>";
        if ($jenis == 'Tetap') {
            $tunjangan = $ref->getProperty('tunjanganKesehatan'); $tunjangan->setAccessible(true);
            $saham = $ref->getProperty('opsiSahamId'); $saham->setAccessible(true);
            echo "• Tunjangan: Rp " . number_format($tunjangan->getValue($k), 2, ',', '.') . "<br>";
            echo "• Saham ID: " . ($saham->getValue($k) ? $saham->getValue($k) : '-');
        } elseif ($jenis == 'Kontrak') {
            $durasi = $ref->getProperty('durasiKontrakBulan'); $durasi->setAccessible(true);
            $agensi = $ref->getProperty('agensiPenyalur'); $agensi->setAccessible(true);
            echo "• Kontrak: " . $durasi->getValue($k) . " Bulan<br>";
            echo "• Agensi: " . $agensi->getValue($k);
        } elseif ($jenis == 'Magang') {
            $sertif = $ref->getProperty('sertifikatKampusMerdeka'); $sertif->setAccessible(true);
            echo "• MSIB: " . ($sertif->getValue($k) ? $sertif->getValue($k) : 'Tidak Ada');
        }
        echo "</small></td>";

        // Hasil Polimorfisme murni menggunakan metode hitungGajiBersih() yang baru
        echo "<td class='text-end fw-bold text-success'>Rp " . number_format($k->hitungGajiBersih(), 2, ',', '.') . "</td>";
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Slip Gaji Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .card { border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 30px; border: none; }
        .card-header { border-radius: 12px 12px 0 0 !important; font-weight: 600; }
        .table th { background-color: #f1f3f5; color: #495057; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Daftar Slip Gaji & Informasi Karyawan</h2>
        <hr class="w-25 mx-auto">
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span>KATEGORI: KARYAWAN TETAP</span>
            <span class="badge bg-light text-primary"><?= count($daftar_tetap) ?> Orang</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th class="text-center">Kehadiran</th><th>Gaji / Hari</th><th>Atribut Spesifik (Jabatan)</th><th class="text-end">Gaji Bersih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php renderTableKaryawan($daftar_tetap, 'Tetap'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <span>KATEGORI: KARYAWAN KONTRAK</span>
            <span class="badge bg-light text-info"><?= count($daftar_kontrak) ?> Orang</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th class="text-center">Kehadiran</th><th>Gaji / Hari</th><th>Atribut Spesifik (Jabatan)</th><th class="text-end">Gaji Bersih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php renderTableKaryawan($daftar_kontrak, 'Kontrak'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <strong>KATEGORI: KARYAWAN MAGANG</strong>
            <span class="badge bg-dark text-white"><?= count($daftar_magang) ?> Orang</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th class="text-center">Kehadiran</th><th>Gaji / Hari</th><th>Atribut Spesifik (Jabatan)</th><th class="text-end">Gaji Bersih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php renderTableKaryawan($daftar_magang, 'Magang'); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>