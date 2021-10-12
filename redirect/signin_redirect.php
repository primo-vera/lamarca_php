<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>signup/login</title>
    <link rel="icon" type="image/x-icon" href="./lamarca.ico" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="../signup_redirect.css" />
    <script src="https://kit.fontawesome.com/5017c7b0a5.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet" />
  </head>
  <body>
    <section class="container" id="container">
       <div class="form-container sign-in-container">
        <form action="../includes/signin.inc.php" method="post">
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-apple"></i></a>
          </div>
          <span>or use your account</span>
          <?php
            if (isset($_GET["email"])) {
              $email = $_GET["email"];
              echo '<input type="text" name="email" placeholder="Email" value="'.$email.'" />';
            }
            else {
              echo '<input type="text" name="email" placeholder="Email" />';
            }
          ?>
          <input type="password" name="pwd" placeholder="Password" />
          <a href="#">Forgot your password?</a>
          <button type="submit" name="signinSubmit" class="btn-action button-signin">Sign In</button>
          <?php
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "emptyinput") {
                echo "<p class='input-error'>Please fill in all fields!</p>";
              }
                else if ($_GET["error"] == "invalidemail") {
                echo "<p class='input-error'>Please enter a valid email!</p>";
              }
               else if ($_GET["error"] == "wronglogin") {
                echo "<p class='input-error'>Email address not found in system!</p>";
              }
               else if ($_GET["error"] == "wrongpwd") {
                echo "<p class='input-error'>Invalid password!</p>";
              }
               else if ($_GET["error"] == "nopwdmatch") {
                echo "<p class='input-error'>Invalid password!</p>";
              }
               else if ($_GET["error"] == "none") {
                echo "<p class='input-success'>You have signed in!</p>";
              }
            }
          ?>
        </form>
      </div>
    </section>
  </body>
</html>