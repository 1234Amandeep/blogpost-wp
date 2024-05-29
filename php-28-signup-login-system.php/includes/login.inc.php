<?php

if($_SERVER["REQUEST_METHOD"] = "POST") {
  // getting userdata from post req.
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  // trying to login user
  try {
    require_once "dbh.inc.php";
    require_once "login_model.inc.php";
    require_once "login_contr.inc.php";

    // // ERROR HANDLING
    $errors = [];

    if(is_user_input_empty($username, $pwd)) {
      $errors['empty_input'] = "Please fill all feilds correctly!";
    }

    // getting user data from db that matches user typed username
    $result = get_user($pdo, $username);
    // var_dump($result);

    if(is_username_wrong($result)) {
      $errors['wrong_username'] = "username does'nt exists!";
    }

    if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
      $errors['wrong_password'] = "Invalid password!";
    }
    
    require_once "config_session.inc.php";

    if($errors) {
      $_SESSION['login_errors'] = $errors;
      header("Location: ../index.php");
      die();
    }


    // re-generating session id after any role changes inside website
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result['id'];
    session_id($sessionId);

    $_SESSION['user_id'] = $result['id'];
    $_SESSION['user_username'] = htmlspecialchars($result['username']);
    $_SESSION["last_regeneration"] = time();

    header("Location: ../index.php?login=success");
    $pdo = null;
    die();
  } catch (PDOException $e) {
    die("Login failed: " . $e.getMessage());
  }
}
else {
  header("Location: ../index.php");
  die();
}