<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:login.php');
	}
?>
<!DOCTYPE html>  
<html lang="id">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Tambah Saldo</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            margin: 0;  
        }  
        .form-tambah-saldo {  
            background-color: #c8ff00;  
            padding: 20px;  
            border-radius: 10px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
        }  
        .form-tambah-saldo h2 {  
            margin-bottom: 20px;  
            text-align: center;  
        }  
        .form-tambah-saldo input[type="number"],  
        .form-tambah-saldo input[type="submit"] {  
            width: 100%;  
            padding: 10px;  
            margin: 10px 0;  
            border: 1px solid #ccc;  
            border-radius: 5px;  
        }  
        .form-tambah-saldo input[type="submit"] {  
            background-color: #4CAF50;  
            color: white;  
            border: none;  
            cursor: pointer;  
        }  
        .form-tambah-saldo input[type="submit"]:hover {  
            background-color: #45a049;  
        }  
    </style>  
</head>  
<body>  

<div class="form-tambah-saldo">  
    <h2>Tambah Saldo</h2>  
    <form action="tambah-saldo.php" method="post">  
        <label for="saldo">Jumlah Saldo:</label>  
        <input type="number" id="saldo" name="jumlah_saldo" required min="1" step="any">  
        <?php
        include "koneksi.php";
        $user_to_find=$_SESSION['username'];
        $sql = "SELECT id,nomer_rekening FROM tb_user WHERE username = '$user_to_find'";  
        $result = mysqli_query($koneksi, $sql);  
        if (mysqli_num_rows($result) > 0) {  
          while ($row = mysqli_fetch_assoc($result)) {  
            echo '<input type="text" id="saldo" name="id_user" value="' . htmlspecialchars($row['id'], ENT_QUOTES) . '" hidden>';
            echo '<input type="text" id="saldo" name="nomer_rekening" value="' . htmlspecialchars($row['nomer_rekening'], ENT_QUOTES) . '" hidden>';
          }  
      } else {  
          echo 'Pengguna tidak ditemukan.';  
      }  
				?>
        <input type="submit" value="Tambah Saldo">  
    </form>  
</div>  
</body>  
</html>