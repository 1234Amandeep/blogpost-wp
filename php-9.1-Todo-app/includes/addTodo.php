<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // sanitizing string data coming from user form submission
  $new_todo = htmlspecialchars($_POST["new-todo"]);

  // creating a todo obj
  $todoObj = new stdClass();
  $todoObj->completed = false;
  $todoObj->todo = $new_todo;
  // var_dump($todoObj);

  // starting a session
  session_start();

  // setting todos inside session
  // checking if the session has already has todos 
  if(!isset($_SESSION["todos"])) {
    // initializing todos in a session
    $todos[] = $todoObj;
    $_SESSION["todos"] = $todos;
  }
  else {
    // adding a new todo to existing todos
    $existed_todos = $_SESSION["todos"];
    array_push($existed_todos, $todoObj);
    $_SESSION["todos"] = $existed_todos;
  }


  // $todos_toshowcase = $_SESSION["todos"];
  // print_r($todos_toshowcase);
  header("Location: ../index.php");
}
else {
  header("Location: ../index.php");
}