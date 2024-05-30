<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  // trying login user in
  try {
    require_once "dbh.inc.php";
    require_once "login_model.inc.php";
    require_once "login_contr.inc.php";
    
    // Error handling
    $errors = [];
    
    if(is_input_empty($username, $pwd)) {
      $errors['input_empty'] = "Please fill all feilds!";
    }

    $result = get_user($pdo, $username);

    if(is_username_incorrect($result)) {
      $errors['incorrect_username'] = "Username does not exists!";
    }
    
    if(!is_username_incorrect($result) && is_password_incorrect($pwd, $result['pwd'])) {
      $errors['incorrect_pwd'] = "Incorrect password!";
    }
    
    
    require_once "config_session.inc.php";
    if($errors) {
      $_SESSION['login_errors'] = $errors;
      $pdo = null;
      header("Location: ../login.php");
      die();
    }
    
    // fetching associated todos from db
    require_once "addTodo_model.inc.php";
    $todos = get_todos($pdo, $result['id']);

    // re-creating session_id after role in website changed
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $user['id'];
    session_id($sessionId);

    // setting session variables
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['user_username'] = $result['username'];
    if($todos) {
      $_SESSION['todos'] = $todos;
    }
    $_SESSION['last_regeneration'] = time();

    $pdo = null;
    header("Location: ../index.php");
    die();

  } catch (PDOException $e) {
    echo "Login failed: " . $e->getMessage();
  }
}
else {
  header("Location: ../index.php");
  die();
}