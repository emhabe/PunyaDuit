<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PunyaDuit</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="atas">
          <h1>PunyaDuit</h1>
          <h3 class="home">Home</h3>
          <h3 class="about">About</h3>
        </div>
      </nav>
    </header>

    <section class="hero">
      <div class="hero-content">
        <h1>The All In One E-Wallet Platform</h1>
        <p>
          Lorem ipsum dolor sit amet. Et autem excepturi qui consequatur velit
          ad amet quod non officiis adipisci ad internos voluptas vel commodi
          dolor sed recusandae quam.
        </p>
        <a id="openModal" class="get-started">Get Started</a>
      </div>
    </section>

    <section class="features">
      <h2>Features</h2>
      <div class="feature-cards">
        <div class="feature-card">
          <div class="icon"></div>
          <h3>Fast Transaction</h3>
          <p>Lorem</p>
        </div>
        <div class="feature-card">
          <div class="icon"></div>
          <h3>Fast Transaction</h3>
          <p>Lorem</p>
        </div>
        <div class="feature-card">
          <div class="icon"></div>
          <h3>Fast Transaction</h3>
          <p>Lorem</p>
        </div>
      </div>
    </section>
   
    <div id="myModal" class="modal">
      <div class="modal-content">
          <span class="close">&times;</span>
          <a href="login.php" class="get-started">Login</a>
          <a href="register.php" class="get-started">Register</a>

      </div>
  </div>
  </body>
</html>

<style>
  /* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 500px; /* Max width */
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Optional styling for the button */
#openModal {
    padding: 10px 20px;
    background-color: #c8ff00;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#openModal:hover {
    background-color: #a8e600;
}

</style>
<script>
  // Get the modal
const modal = document.getElementById("myModal");

// Get the button that opens the modal
const btn = document.getElementById("openModal");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>