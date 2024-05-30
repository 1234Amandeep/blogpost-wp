<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "config_session.inc.php";
  // if user not logged in
  if(!isset($_SESSION['user_id'])) {
    var_dump($_SESSION['user_id']);
    echo "user does not exists";
    header("Location: ../signup.php");
    die();
  }
  else {
    // user signed up   
    echo "user exists";
    $new_todo = $_POST['new-todo'];

    // try to add todo
    try {
      require_once "dbh.inc.php";
      require_once "addTodo_model.inc.php";
      require_once "addTodo_contr.inc.php";
      
      // Error handling
      $errors = [];
      
      if(is_input_empty($new_todo)) {
        $errors['empty_input'] = "Please fill todo correctly!";
      }
      
      if($errors) {
        $_SESSION['todo_errors'] = $errors;
        header("Location: ../index.php");
        die();
      }

      $user_id = $_SESSION['user_id'];
      create_todo($pdo, $user_id, $new_todo);

      // get all todos and set them in session
      $todos = get_todos($pdo, $user_id);

      if($todos) {
        $_SESSION['todos'] = $todos;
      }

      $pdo = null;
      $stmt = null;
      header("Location: ../index.php");
      die();
      
    } catch (PDOException $e) {
      echo "Insertion failed: " . $e->getMessage();
      header("Location: ../index.php");
      die();
    }
  }
}
else {
  header("Location: ../index.php");
  die();
}