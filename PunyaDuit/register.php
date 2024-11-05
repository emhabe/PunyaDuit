<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style-register.css" />
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
        <h2>Join Now!</h2>
        <p>Please Enter Your Details</p>
        <form>
          <input type="text" placeholder="Username" required />
          <input type="email" placeholder="Email" required />
          <input type="password" placeholder="Password" required />
          <button type="submit">Sign Up</button>
        </form>
        <p class="login-text">
          Already Have an Account? <a href="login.php">Log In</a>
        </p>
      </div>
    </div>
  </body>
</html>
