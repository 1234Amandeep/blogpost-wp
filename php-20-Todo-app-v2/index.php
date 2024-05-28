<?php
require_once "./includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo App V2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="./css/main.css">
  <script>
  function onChange(id) {
    document.getElementById(id).submit();
  }
  </script>
</head>

<body>
  <h4 class="display-2 text-center mt-5"><u>Todos</u></h4>
  <div class="form-container container d-flex justify-content-center mt-5 mb-5">
    <form action="./includes/addTodo.inc.php" method="post" class="d-flex flex-column justify-content-center">
      <label for="new-todo" target="new-todo">Enter Todo:</label>
      <input type="text" id="new-todo" name="new-todo" placeholder="new todo...">
      <button type="submit" class="btn btn-primary mt-5">Add todo</button>
    </form>
  </div>
  <div class="todos-container container d-flex flex-column align-items-center justify-content-center">
    <!-- php code here -->
    <?php
  // selecting todos from db
  try {
    $querySelect = "SELECT * FROM " . $table . ";";

    $stmt = $pdo->prepare($querySelect);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = null;
    $querySelect = null;

    if(count($result) != 0) {
      foreach($result as $row) {
        $status = ($row['status'] == 0 ? false : true);
        echo "<form class='todo-container mb-3' action='./includes/handleTodo.inc.php' method='post'          id='" . $row['id'] . "'>
                    <input type='hidden' name='form_id' value='" . $row['id'] . "'>
                    <input type='checkbox' " . ($status ? 'checked' : '') . "  class='me-1' name='completed' onchange='onChange(" . $row['id'] . ")' id='completed-" . $row['id'] . "'>
                    <label for='completed-" . $row['id'] . "' target='completed-" . $row['id'] . "' class='me-3 " . ($status ? 'text-muted text-decoration-line-through' : '') . "'>" . $row['todo_text'] . "</label>
                    <button type='submit' class='btn btn-danger btn-sm' name='delete-btn'>Delete</button>
                  </form>";
      }
    }
    else {
      echo "<br> Empty list";
    }
    
  } catch (PDOException $e) {
    echo "<br> Empty list";
    // echo "<br> Error while selecting todos from db: " . $e->getMessage();
  }
  ?>
  </div>
</body>

</html>