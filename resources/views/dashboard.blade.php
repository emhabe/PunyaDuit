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
           {{$data->jumlah_saldo}}
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
              <a href="/cetak">Cetak</a>
            </button>
          </div>
          <table>
            <thead>
              <tr>
                <th>Jumlah Saldo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($saldo as $k)
    <td>{{$k->jumlah_saldo}}</td>
              @endforeach
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