<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo App (php-9.1)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="./css/main.css">
  <script>
  // Making form submission automatic when user changes checkbox's state
  function onChange(id) {
    document.getElementById(`form-todo${id}`).submit();
  }

  function onClick(id) {

  }
  </script>
</head>

<body>
  <h4 class="display-2 text-center mt-5"><u>Todos</u></h4>
  <div class="form-container container d-flex justify-content-center mt-5 mb-5">
    <form action="./includes/addTodo.php" method="post" class="d-flex flex-column justify-content-center">
      <label for="new-todo" target="new-todo">Enter Todo:</label>
      <input type="text" id="new-todo" name="new-todo" placeholder="new todo...">
      <button type="submit" class="btn btn-primary mt-5">Add todo</button>
    </form>
  </div>
  <div class="todos-container container d-flex flex-column align-items-center justify-content-center">


    <!-- php code... -->
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "GET") {
      // starting session to access todos
      session_start();
      // TODO: NOT BEING ABLE TO ACCESS SESSION TODOS
      
      // checking if session has todos 
      if(isset($_SESSION["todos"])) {
        $todos_in_session = $_SESSION["todos"];
        $count = count($todos_in_session);

        // sanitizing each object inside array
        for($i = 0; $i < $count; $i++) {
          $target_obj = $todos_in_session[$i];
          $todo_string = $target_obj->todo;
          $sanitized_todo_string = htmlspecialchars($todo_string);
          $target_obj->todo = $sanitized_todo_string;
          $todos_in_session[$i] = $target_obj;
        }
        
        
        // checking if their are todos to showcase
        if($count > 0) {
          // showcasing all todos
          for($i = 0; $i < $count; $i++) {
            if(isset($todos_in_session[$i])) {
              echo "<form class='todo-container mb-3' action='./includes/handleChange.php' method='post'          id='form-todo" . $i . "'>
                    <input type='hidden' name='form_id' value='" . $i . "'>
                    <input type='checkbox' " . ($todos_in_session[$i]->completed ? 'checked' : '') . "  class='me-1' name='completed' onchange='onChange(" . $i . ")' id='completed'>
                    <label for='completed' target='completed' class='me-3 " . ($todos_in_session[$i]->completed ? 'text-muted text-decoration-line-through' : '') . "'>" . $todos_in_session[$i]->todo . "</label>
                    <button type='submit' class='btn btn-danger btn-sm' name='delete-btn'>Delete</button>
                  </form>";
            } 

            // echo $count . "<br>";
            // var_dump($todos_in_session);
          }
        }
        else {
          echo "<h4 class='text-center text-light'>Empty List</h4>";
        }
    }
    else {
    }
    }
    ?>
  </div>
</body>

</html>