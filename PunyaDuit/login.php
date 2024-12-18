<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style-login.css" />
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">PunyaDuit</div>
        <ul class="nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
        </ul>
        <ul class="auth-links">
          <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li>
        </ul>
      </nav>
    </header>

    <div class="signup-container">
      <div class="signup-box">
        <h2>Welcome Back !</h2>
        <p>Please Enter Your Details</p>
        <form action="post-login.php" method="post">
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit">Log in</button>
        </form>
        <p class="login-text">
          Don't Have an Account? <a href="register.php">Sign Up</a>
        </p>
      </div>
    </div>
  </body>
</html>
