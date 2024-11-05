<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Materi</title>
    <link rel="stylesheet" href="style-register.css" />
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">PunyaDuit</div>
      </nav>
    </header>
    <div class="signup-container">
      <div class="signup-box">
        <h2>Tambah Materi</h2>
        <form action="post-materi.php" method="post">
          <input type="text" name="nama" placeholder="Nama" required />
          <input type="text" name="deskripsi" placeholder="Deskripsi" required />
          <input type="text" name="kategori" placeholder="Kategori" required />
          <button type="submit">Tambah</button>
        </form>
      </div>
    </div>
  </body>
</html>
