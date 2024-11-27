<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Saldo</title>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for centering */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form card styling */
        .form-card {
            background-color: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        /* Header */
        .form-card h2 {
            color: white;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Label and input fields */
        label {
            color: white;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: white;
            font-size: 16px;
        }

        input::placeholder, select::placeholder {
            color: #bbb;
        }

        /* Button styling */
        button {
            width: 100%;
            padding: 10px;
            background-color: #39ff14;  /* Neon green */
            color: black;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #32cc12;  /* Darker neon green */
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="form-card">
            <h2>Tambah Transaksi Saldo</h2>
            <form action="post-transaction.php" method="post">
                <label for="category">Nomer Rekening</label>
                <input type="text" id="category" name="rekening_tujuan" placeholder="Masukkan Nomer Rekening">
                <label for="balance">Jumlah Saldo</label>
                <input type="number" id="balance" name="saldo_transaksi" placeholder="Masukkan Saldo">
                <label for="transaction_type">Tipe Transaksi</label>
                <select id="transaction_type" name="transaksi">
                    <option value="">Pilih Tipe Transaksi</option>
                    <option value="Penambah Kekayaan">Penambah Kekayaan</option>
                    <option value="Cuma Nambah Saldo Aja">Cuma Nambah saldo Aja</option>
                </select>
                <?php
        include "koneksi.php";
        $user_to_find=$_SESSION['username'];
        $sql = "SELECT id,nomer_rekening FROM tb_user WHERE username = '$user_to_find'";  
        $result = mysqli_query($koneksi, $sql);  
        if (mysqli_num_rows($result) > 0) {  
          while ($row = mysqli_fetch_assoc($result)) {  
            $id_user =$row['id'];
            echo '<input type="text" id="saldo" name="id_user" value="' . htmlspecialchars($row['id'], ENT_QUOTES) . '" >';
            echo '<input type="text" id="saldo" name="nomer_rekening" value="' . htmlspecialchars($row['nomer_rekening'], ENT_QUOTES) . '" >';
          }  
      } else {  
          echo 'Pengguna tidak ditemukan.';  
            }
                $sql2="SELECT id FROM tb_saldo WHERE id_user=$id_user"; 
                $result2 = mysqli_query($koneksi, $sql2);  
                if (mysqli_num_rows($result2) > 0) {  
                    while ($row = mysqli_fetch_assoc($result2)) {  
                      echo '<input type="text" id="saldo" name="id_saldo" value="' . htmlspecialchars($row['id'], ENT_QUOTES) . '" >';
                    }  
                }
				?>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>

</body>
</html>
