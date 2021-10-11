<!DOCTYPE html>
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
      <div class="form-container sign-up-container">
        <form action="includes/signup.inc.php" method="post">
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-apple"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" name="name" placeholder="Full name"/>
          <input type="text" name="email" placeholder="Email" />
          <input type="password" name="pwd" placeholder="Password" />
          <input type="password" name="pwdrepeat" placeholder="Repeat password" />
          <button class="btn-action" type="submit" name="signupSubmit">Sign Up</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Get Started!</h1>
            <p>Sign up today and begin giving your car<br />
              the attention it deserves!</p>
            <button class="ghost ghost-signin" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Already Registered?</h1>
            <p>Sign in to make an appointment or access your profile.</p>
            <button class="ghost ghost-signup" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ******************************************************************************* -->
    <script src="./signin.js"></script>
  </body>
</html>