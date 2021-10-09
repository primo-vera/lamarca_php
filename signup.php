<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>signup/login</title>
    <link rel="icon" type="image/x-icon" href="./lamarca.ico" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./signin.css" />
    <script src="https://kit.fontawesome.com/5017c7b0a5.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet" />
  </head>
  <body>
    <section class="container" id="container">
      <div class="form-container sign-in-container">
        <form class="" action="includes/signin.inc.php" method="post">
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-apple"></i></a>
          </div>
          <span>or use your account</span>
          <input type="text" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <a href="#">Forgot your password?</a>
          <button type="submit" name="signinSubmit" class="btn-action">Sign In</button>
    </form>
      </div>
      <div class="form-container sign-up-container">
        <form action="includes/signup.inc.php" method="post">
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-apple"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" name="name" placeholder="Full name" />
          <input type="text" name="email" placeholder="Email" />
          <input type="password" name="pwd" placeholder="Password" />
          <input type="password" name="pwdrepeat" placeholder="Repeat password" />
          <button class="btn-action" type="submit" name="signupSubmit">Sign Up</button>

<!------------------------------------- Signup Form Messages ----------------------------------------------------------------->
<?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;'>Please fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invalidname") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;'>Please fill in first and last name!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;''>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordmismatch") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;'>Passwords do not match!</p>";
      }
      else if ($_GET["error"] == "emailtaken") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;'>Email already in use!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p style='color:#ff1400;padding:10px;font-weight:350;'>Something went wrong, please try again!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p style='color:#1bc400;padding:10px;font-weight:350;'>You have signed up!</p>";
      }
    }
  ?>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </section>

    <!-- ******************************************************************************* -->
    <script src="./signin.js"></script>
  </body>
</html>