<?php
session_start(); // Memulai session untuk mendapatkan username yang login

include "koneksi.php"; // Koneksi ke database
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Pastikan username ada dalam session
if (!isset($_SESSION['username'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

$username = $_SESSION['username']; // Mengambil username yang sedang login

// Query untuk mendapatkan ID user berdasarkan username
$query_user = mysqli_query($koneksi, "SELECT id FROM tb_user WHERE username = '$username'");
$user_data = mysqli_fetch_assoc($query_user);

if (!$user_data) {
    echo "Pengguna tidak ditemukan!";
    exit;
}

$user_id = $user_data['id']; // Mengambil ID user yang ditemukan

// Query untuk mendapatkan data transaksi berdasarkan ID user yang sedang login
$query = mysqli_query($koneksi, "
    SELECT 
        id, 
        saldo_transaksi, 
        transaksi, 
        tanggal_transaksi, 
        id_saldo, 
        id_user, 
        nomer_rekening, 
        rekening_tujuan 
    FROM tb_transaksi 
    WHERE id_user = '$user_id'
");

// Membuat struktur HTML untuk laporan
$html = '<center><h3>Laporan Transaksi</h3></center><hr/><br>';
$html .= '<table border="1" width="100%" style="border-collapse: collapse;">
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Saldo Transaksi</th>
                <th>Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>ID Saldo</th>
                <th>ID User</th>
                <th>Nomor Rekening</th>
                <th>Rekening Tujuan</th>
            </tr>';
$no = 1;

while ($transaksi = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $transaksi['id'] . "</td>
                <td>Rp. " . number_format($transaksi['saldo_transaksi'], 2, ',', '.') . "</td>
                <td>" . htmlspecialchars($transaksi['transaksi']) . "</td>
                <td>" . date('d-m-Y H:i:s', strtotime($transaksi['tanggal_transaksi'])) . "</td>
                <td>" . $transaksi['id_saldo'] . "</td>
                <td>" . $transaksi['id_user'] . "</td>
                <td>" . $transaksi['nomer_rekening'] . "</td>
                <td>" . $transaksi['rekening_tujuan'] . "</td>
              </tr>";
    $no++;
}

$html .= "</table>";

// Memuat HTML ke dalam DOMPDF
$dompdf->loadHtml($html);

// Mengatur ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'landscape');

// Merender PDF
$dompdf->render();

// Menyimpan dan memaksa unduhan file PDF
$dompdf->stream('laporan-transaksi.pdf');
?>
