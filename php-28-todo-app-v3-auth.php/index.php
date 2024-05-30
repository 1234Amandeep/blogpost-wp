<?php
require_once "./includes/config_session.inc.php";
require_once "./includes/signup_view.inc.php";

require_once "./includes/addTodo_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo-app-v3-auth</title>
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
  <!-- todo form -->
  <h4 class="display-2 text-center mt-5">
    <u>
      <?php
      check_user_signedup();
      ?>
    </u>
  </h4>

  <?php if(isset($_SESSION['user_id'])) { ?>
  <div class="logout-form-container container d-flex justify-content-center mt-5 mb-5">
    <form action="./includes/logout.inc.php" method="post" class="d-flex flex-column justify-content-center">

      <button type="submit" class="btn btn-primary mt-5">Logout</button>
    </form>
  </div>
  <?php } ?>

  <div class="todo-form-container container d-flex justify-content-center mt-5 mb-5">
    <form action="./includes/addTodo.inc.php" method="post" class="d-flex flex-column justify-content-center">
      <label for="new-todo" target="new-todo">Enter Todo:</label>
      <input type="text" id="new-todo" name="new-todo" placeholder="new todo...">
      <button type="submit" class="btn btn-primary mt-5">Add todo</button>
    </form>
  </div>
  <?php if($_SESSION['user_id']) {?>
  <div class="todos-container container d-flex flex-column align-items-center justify-content-center">
    <!-- checking todo & todo_errors -->
    <?php
    checking_todos();
    ?>
  </div>
  <?php } ?>
</body>

</html>