<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];

  // trying to sign user up
  try {
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_contr.inc.php";

    // Error Handling
    $errors = [];

    if(is_input_empty($username, $pwd, $email)) {
      $errors['input_empty'] = "Please fill all feilds correctly!";
    }

    if(is_email_invalid($email)) {
      $errors['invalid_email'] = "Invalid email!";
    }

    if(is_email_taken($pdo, $email)) {
      $errors['taken_email'] = "Email already registered!";
    }

    if(is_username_already_exists($pdo, $username)) {
      $errors['taken_username'] = "Username already exists!";
    }

    require_once "config_session.inc.php";
    if($errors) {
      $_SESSION['signup_errors'] = $errors;
      header("Location: ../signup.php");
      die();
    }

    $user = create_user($pdo, $username, $pwd, $email);
    if($user) {
      // re-creating session_id after role in website changed
      $newSessionId = session_create_id();
      $sessionId = $newSessionId . "_" . $user['id'];
      session_id($sessionId);
      
      // setting up session variables after user signed up
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_username'] = $user['username'];
      $_SESSION['last_regeneration'] = time();
    }
    $pdo = null;
    header("Location: ../index.php");
    die();



  } catch (PDOException $e) {
    echo "Sign up failed: " .$e->getMessage();
  }
}
else {
  header("Location: ../index.php");
  die();
}