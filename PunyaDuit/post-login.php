<?php 
include 'koneksi.php'; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid password.";
            header("Location: login.php");

        }
    } else {
        echo "User not found.";
        header("Location: login.php");
}
?>
