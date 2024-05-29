<?php

if($_SERVER["REQUEST_METHOD"] = "POST") {
  // getting userdata from post req.
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];

  // trying to signup user
  try {
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_contr.inc.php";

    // ERROR HANDLING
    $errors = [];

    if(is_user_input_empty($username, $pwd, $email)) {
      $errors['empty_input'] = "Please fill all feilds correctly!";
    }
    if(is_invalid_email($email)) {
      $errors['invalid_email'] = "Please enter a valid email!";
    }
    if(is_username_already_taken($pdo, $username)) {
      $errors['username_taken'] = "Username already taken!";
    }
    if(is_email_already_used($pdo, $email)) {
      $errors['email_used'] = "Email already exists!";
    }

    require_once "config_session.inc.php";

    if($errors) {
      $_SESSION['signup_errors'] = $errors;
      header("Location: ../index.php");
      die();
    }

    create_user($pdo, $username, $pwd, $email);

    $pdo = null;
    header("Location: ../index.php?signup=success");
    die();
  } catch (PDOException $e) {
    die("Login failed: " . $e.getMessage());
  }
}
else {
  header("Location: ../index.php");
  die();
}