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
          <img src="profile.png" alt="Profile" class="profile-pic" />
          <p class="profile-name">M. Hafill Biribiq</p>
        </div>
        <div class="menu-section">
          <p>Main Menu</p>
          <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Transaction</a></li>
            <li><button onclick="confirmLogout()">Logout</button></li>
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
          <div class="action-box">Top Up</div>
          <div class="action-box balance">
            Balance <br />
            Rp. 1.000.000
          </div>
          <div class="action-box">Send</div>
        </div>

        <!-- Transaction History -->
        <div class="transaction-history">
          <div class="history-header">
            <h3>Transaction History</h3>
            <a href="#" class="see-detail">See Detail</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Account Number</th>
                <th>Paid</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Joko Anwar</td>
                <td>34537641</td>
                <td>Rp.5.000.000</td>
                <td>14 April 2019</td>
                <td><span class="status safe">Safe</span></td>
              </tr>
              <tr>
                <td>Jojo Anak Ke 5</td>
                <td>34537641</td>
                <td>Rp.5.000.000</td>
                <td>14 April 2019</td>
                <td><span class="status safe">Safe</span></td>
              </tr>
              <tr>
                <td>Gojo Speru</td>
                <td>34537641</td>
                <td>Rp.5.000.000</td>
                <td>14 April 2019</td>
                <td><span class="status safe">Safe</span></td>
              </tr>
              <tr>
                <td>Naruto Suzuki</td>
                <td>34537641</td>
                <td>Rp.5.000.000</td>
                <td>14 April 2019</td>
                <td><span class="status safe">Safe</span></td>
              </tr>
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