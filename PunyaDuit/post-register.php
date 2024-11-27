<?php 
include 'koneksi.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nomer_rekening = '';
    for ($i = 0; $i < 5; $i++) {
    $nomer_rekening .= rand(0, 9); 
    }
    $sql = "INSERT INTO tb_user VALUES(NULL, '$username', '$email', '$password','$nomer_rekening')";
    if (mysqli_query($koneksi, $sql)) {
        header("location:login.php");
    } else {
        return "Terjadi kesalahan, coba lagi nanti.";
    }
?>
