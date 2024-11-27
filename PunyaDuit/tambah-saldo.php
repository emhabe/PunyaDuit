<?php   
include 'koneksi.php';  
$saldo = $_POST['jumlah_saldo'];  
$id_user = $_POST['id_user'];  
$nomer_rekening = $_POST['nomer_rekening'];

$query = "SELECT * FROM tb_saldo WHERE id_user = '$id_user'";
$result = $koneksi->query($query);
if (!empty($saldo) && !empty($id_user)) {  
    $row = $result->fetch_assoc();
    if ($row['jumlah_saldo'] > 0) {  
        mysqli_query($koneksi, "UPDATE tb_saldo SET jumlah_saldo = jumlah_saldo + '$saldo' WHERE id_user = '$id_user'");  
    } 
    else {  
        mysqli_query($koneksi, "INSERT INTO tb_saldo VALUES (NULL, '$saldo', '$id_user','$nomer_rekening')"); 
    }  
    header("Location: dashboard.php");  
} else {  
    echo "Saldo dan ID pengguna tidak boleh kosong.";  
}  
?>