<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./lamarca.ico" />
    <link rel="stylesheet" href="../aReset.css" />
    <link rel="stylesheet" href="../signup_redirect.css" />
    <script src="https://kit.fontawesome.com/5017c7b0a5.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet" />
</head>
<body>
  <section class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="../includes/signup.inc.php" method="post">
        <h1>Create Account</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-apple"></i></a>
        </div>
        <span>or use your email for registration</span>
        <?php
          if (isset($_GET["name"])) {
            $name = $_GET["name"];
            echo '<input type="text" name="name" placeholder="Full name" value="'.$name.'" />';
          }
          else {
            echo '<input type="text" name="name" placeholder="Full name"  />';
          }
          if (isset($_GET["email"])) {
            $email = $_GET['email'];
            echo '<input type="text" name="email" placeholder="Email" value="'.$email.'"/>'; 
          }
          else {
            echo '<input type="text" name="email" placeholder="Email" />';
          }
        ?>
        <input type="password" name="pwd" placeholder="Password" />
        <input type="password" name="pwdrepeat" placeholder="Repeat password" />
        <button class="btn-action signup" type="submit" name="signupSubmit">Sign Up</button>
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo "<p class='input-error'>Please fill in all fields!</p>";
            }
            else if ($_GET["error"] == "invalidname") {
              echo "<p class='input-error'>Please fill in first and last name!</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
              echo "<p class='input-error'>Please enter a valid email!</p>";
            }
            else if ($_GET["error"] == "passwordmismatch") {
              echo "<p class='input-error'>Passwords do not match!</p>";
            }
            else if ($_GET["error"] == "emailtaken") {
              echo "<p class='input-error'>Email already in use!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
              echo "<p class='input-error'>Something went wrong, please try again!</p>";
            }
            else if ($_GET["error"] == "none") {
              echo "<p class='input-success'>You have signed up!</p>";
            }
          }
        ?>
      </form>
    </div>
  </section> 
</body>
</html>