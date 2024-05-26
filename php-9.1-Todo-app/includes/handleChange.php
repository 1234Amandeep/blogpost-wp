<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();
  if(isset($_SESSION["todos"])) {
    $todos_in_session = $_SESSION["todos"];

    // which todo
    if(isset($_POST["form_id"])) {
      $todo_num = filter_input(INPUT_POST, "form_id", FILTER_SANITIZE_NUMBER_INT);
      echo "todo_num: " . $todo_num . "<br>";

      // which btn generated this req.
      if(isset($_POST["delete-btn"])) {
        echo "delete btn generated this req. <br>";
        unset($todos_in_session[$todo_num]);
        $todos_in_session = array_values($todos_in_session);
        $_SESSION["todos"] = $todos_in_session;
        header("Location: ../index.php");
      } 
      else if(isset($_POST["completed"])) {
        echo "checkbox generated and from unchecked to checked! <br>";
        $todos_in_session[$todo_num]->completed = true;
        $_SESSION["todos"] = $todos_in_session;
        header("Location: ../index.php");
      } 
      else {
        echo "checkbox generated and from checked to unchecked! <br>";
        $todos_in_session[$todo_num]->completed = false;
        $_SESSION["todos"] = $todos_in_session;
        header("Location: ../index.php");
      }
    }
  }
}
else {
  header("Location: ../index.php");
}