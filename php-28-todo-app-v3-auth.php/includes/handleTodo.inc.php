<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

  require_once "config_session.inc.php";
  require_once "dbh.inc.php";
  require_once "handleTodo_model.inc.php";
  require_once "handleTodo_contr.inc.php";

  if(isset($_SESSION["todos"])) {
    $todos_in_session = $_SESSION["todos"];
    $todo_status = 0;
    if(isset($_POST['completed'])) {
      $todo_status = 1;
    }

    // which todo
    if(isset($_POST["form_id"])) {
      $todo_num = filter_input(INPUT_POST, "form_id", FILTER_SANITIZE_NUMBER_INT);
      echo "todo_num: " . $todo_num . "<br>";
      echo "status: " . $todo_status . "<br>";

      // which btn generated this req.
      if(isset($_POST["delete-btn"])) {
        echo "delete btn generated this req. <br>";
        // delete todo from db
        remove_todo($pdo, $todo_num);
        //get todos from db
        require_once "addTodo_model.inc.php";
        $user_id = $_SESSION['user_id'];
        $todos = get_todos($pdo, $user_id);
        // reset todos
        $_SESSION['todos'] = $todos;        
        header("Location: ../index.php");
      } 
  //     else if(isset($_POST["completed"])) {
  //       echo "checkbox generated and from unchecked to checked! <br>";
  //       // $todos_in_session[$todo_num]->completed = true;
  //       // $_SESSION["todos"] = $todos_in_session;
  //       // header("Location: ../index.php");
  //     } 
      else {
        echo "checkbox status changed! <br>";
        // changing todo status in db
        flip_todo($pdo, $todo_num, $todo_status);
        // get all todos from db
        require_once "addTodo_model.inc.php";

        $user_id = $_SESSION['user_id'];
        $todos = get_todos($pdo, $user_id);

        // reseting session todos
        $_SESSION['todos'] = $todos;
        header("Location: ../index.php");
      }
    }
  }
}
else {
  header("Location: ../index.php");
  die();
}