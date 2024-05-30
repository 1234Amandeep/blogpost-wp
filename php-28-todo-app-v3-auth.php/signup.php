<?php
require_once "./includes/config_session.inc.php";
require_once "./includes/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="./css/main.css">
</head>

<body>
  <h1 class="text-center mt-5 mb-5"><u>Signup</u></h1>
  <div class="signup-form-container d-flex justify-content-center mb-5">
    <form action="./includes/signup.inc.php" method="post">
      <label for="username" target="username">Username:</label>
      <br>
      <input type="text" name="username" id="username">
      <br><br>
      <label for="pwd" target="pwd">Password:</label>
      <br>
      <input type="password" name="pwd" id="pwd">
      <br><br>
      <label for="email" target="email">Email:</label>
      <br>
      <input type="text" name="email" id="email">
      <br><br>
      <div class="btn-container d-flex justify-content-center">
        <button type="submit" class="btn btn-md btn-primary">Sign up</button>
      </div>
    </form>
  </div>
  <p class="text-center text-light">If you already have an account. <a href="login.php">Login</a></p>

  <?php
  // checking signup errors
  check_signup_errors();
  ?>

</body>

</html>