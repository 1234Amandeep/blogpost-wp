<?php

declare(strict_types=1);


function checking_todos() {
  if(isset($_SESSION['todo_errors'])) {
    $errors = $_SESSION['todo_errors'];
    foreach($errors as $error) {
      echo "<br>";
      echo '<p class="text-center text-danger">' . $error . '</p>';
    }
    unset($_SESSION['todo_errors']);
  } else if(isset($_SESSION['todos'])) {
    $todos = $_SESSION['todos'];
    if($todos) {
      foreach($todos as $todo) {
          // var_dump($todo);
          
          $status = ($todo['checked'] == 0 ? false : true);
          // echo "<br>";
          // echo $status;
          echo "<form class='todo-container mb-3' action='./includes/handleTodo.inc.php' method='post'          id='" . $todo['id'] . "'>
                      <input type='hidden' name='form_id' value='" . $todo['id'] . "'>
                      <input type='checkbox' " . ($status ? 'checked' : '') . "  class='me-1' name='completed' onchange='onChange(" . $todo['id'] . ")' id='completed-" . $todo['id'] . "'>
                      <label for='completed-" . $todo['id'] . "' target='completed-" . $todo['id'] . "' class='me-3 " . ($status ? 'text-muted text-decoration-line-through' : '') . "'>" . $todo['todo_text'] . "</label>
                      <button type='submit' class='btn btn-danger btn-sm' name='delete-btn'>Delete</button>
                    </form>";
        }
  
    }
  
  }
  else {
    echo '<h4 class="text-center text-light">Empty list</h4>';
  }
}