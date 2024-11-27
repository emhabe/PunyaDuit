<?php
include "koneksi.php";

$saldo_transaksi = $_POST['saldo_transaksi'];
$transaksi = $_POST['transaksi'];
$tanggal_transaksi = date('Y-m-d H:i:s');
$id_saldo = $_POST['id_saldo'];
$id_user = $_POST['id_user'];
$nomer_rekening = $_POST['nomer_rekening']; 
$rekening_tujuan = $_POST['rekening_tujuan']; 
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$insert_query = "INSERT INTO tb_transaksi VALUES (NULL, '$saldo_transaksi', '$transaksi', '$tanggal_transaksi', '$id_saldo', '$id_user', '$nomer_rekening', '$rekening_tujuan')";
if (mysqli_query($koneksi, $insert_query)) {
    echo "Transaksi berhasil ditambahkan.<br>";
} else {
    echo "Error: " . mysqli_error($koneksi);
    exit(); 
}

$update_penerima_query = "UPDATE tb_saldo SET jumlah_saldo = jumlah_saldo + $saldo_transaksi WHERE nomer_rekening = '$rekening_tujuan'";
if (mysqli_query($koneksi, $update_penerima_query)) {
    echo "Saldo penerima berhasil diperbarui.<br>";
} else {
    echo "Error: " . mysqli_error($koneksi);
    exit(); 
}
$update_pengirim_query = "UPDATE tb_saldo SET jumlah_saldo = jumlah_saldo - $saldo_transaksi WHERE nomer_rekening = '$nomer_rekening'";
if (mysqli_query($koneksi, $update_pengirim_query)) {
    echo "Saldo pengirim berhasil dikurangi.<br>";
} else {
    echo "Error: " . mysqli_error($koneksi);
    exit(); 
}

header("Location: dashboard.php");
exit();
?>
