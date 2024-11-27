<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="style-dashboard.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <aside class="sidebar">
        <div class="sidebar-logo">PunyaDuit</div>
        <div class="profile-section">
          <p class="profile-name">
            <?php
        include "koneksi.php";
				echo $_SESSION['username'];
        echo "<br></br>";
        $user_to_find=$_SESSION['username'];
        $sql = "SELECT nomer_rekening FROM tb_user WHERE username = '$user_to_find'";  
        $result = mysqli_query($koneksi, $sql);  
        if (mysqli_num_rows($result) > 0) {  
          // Mengambil data  
          while ($row = mysqli_fetch_assoc($result)) {  
              echo 'Nomor Rekening: ' . $row['nomer_rekening'];  
          }  
      } else {  
          echo 'Pengguna tidak ditemukan.';  
      }  
				?>
      </p>
        </div>
        <div class="menu-section">
          <p>Main Menu</p>
          <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Transaction</a></li>
            <style>
              .logout-button {
            background-color: #c8ff00; /* Button background color */
            color: black; /* Text color */
            border: none; /* Remove default border */
            padding: 10px 20px; /* Add padding */
            font-size: 16px; /* Text size */
            cursor: pointer; /* Change cursor to pointer */
            border-radius: 5px; /* Rounded corners */
            text-decoration: none; /* Remove underline from link */
        }

        /* Optional: Button hover effect */
        .logout-button:hover {
            background-color: #a8e600; /* Darker shade on hover */
        }
            </style>
            <li><button class="logout-button" onclick="confirmLogout()">
              <a href="logout.php"></a>Logout</button></li>
          </ul>
        </div>
      </aside>
      <!-- Main Content -->
      <main class="main-content">
        <div class="dashboard-header">
          <h2>Dashboard</h2>
        </div>
        <!-- Top Up, Balance, Send Section -->
        <div class="dashboard-actions">
          <style>
            .action-box {  
            display: inline-block;  
            padding: 20px;  
            margin: 10px;  
            background-color: #c8ff00; 
            color: black; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
            text-align: center; 
        }  
        .action-box:hover {  
            background-color: #45a049; 
        }  
          </style>
          <div class="action-box" onclick="redirectToTopUp()">Top Up</div>
          <script>  
    function redirectToTopUp() {  
        window.location.href = "topup.php"; // Arahkan ke topup.php  
    }  
</script>  
          <div class="action-box balance">
            Balance <br />
            <?php
              include "koneksi.php";     
              $user_to_find = $_SESSION['username'];
              $sql = "SELECT id FROM tb_user WHERE username = '$user_to_find'";
              $result = mysqli_query($koneksi, $sql);
              if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $user_id = $row['id']; 
                  $sql2 = "SELECT jumlah_saldo FROM tb_saldo WHERE id_user = '$user_id'";
                  $result2 = mysqli_query($koneksi, $sql2);
                  if (mysqli_num_rows($result2) > 0) {
                      $row2 = mysqli_fetch_assoc($result2);
                      $saldo = $row2['jumlah_saldo'];  
                      echo $saldo;  
                  } 
                  else {
                      echo '0'; 
                  }
                }
			    	?>
          </div>
          <div class="action-box" onclick="redirectToSend()">Send</div>
          <script>  
    function redirectToSend() {  
        window.location.href = "transaction.php"; // Arahkan ke topup.php  
    }  
</script> 
        </div>
        <!-- Transaction History -->
        <div class="transaction-history">
          <div class="history-header">
            <h3>Transaction History</h3>
            <button>
              <a href="cetak.php">Cetak</a>
            </button>
          </div>
          <table>
            <thead>
              <tr>
                <th>Type Transaksi</th>
                <th>Account Number</th>
                <th>Paid</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";
              $user_to_find = $_SESSION['username'];
              $sql = "SELECT id FROM tb_user WHERE username = '$user_to_find'";
              $result = mysqli_query($koneksi, $sql);
              if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $user_id = $row['id']; 
              }
              $query = "SELECT * FROM tb_transaksi WHERE id_user = $user_id";
              $result = mysqli_query($koneksi, $query);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                  $tanggal = date('d F Y', strtotime($row['tanggal_transaksi']));
                  echo "<tr>
                  <td>{$row['transaksi']}</td>
                  <td>{$row['rekening_tujuan']}</td>
                  <td>Rp. " . number_format($row['saldo_transaksi'], 2, ',', '.') . "</td>
                  <td>{$tanggal}</td>
                  <td><span class='status safe'>Safe</span></td>
                </tr>";
              }
            }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </body>
</html>
<script>
  function confirmLogout() {
      const confirmation = confirm("Apakah Anda yakin ingin keluar?");
      if (confirmation) {
          // Arahkan pengguna ke halaman logout
          window.location.href = "logout.php"; // Ganti dengan URL logout Anda
      }
  }
</script>