<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
  // connecting to db
  require_once "dbh.inc.php";
  
  // extracting new-todo from post req.
  $new_todo = $_POST["new-todo"];
  
  // trying to store it inside db
  try {
    // checking if the todos table exists inside db
    $table = "todos";

    $querycheck = "SHOW TABLES LIKE :table;";

    $stmtcheck = $pdo->prepare($querycheck);

  // binding data to statment placeholders
  $stmtcheck->bindParam("table", $table);

  // telling it to execute the given statement with data
  $stmtcheck->execute();

  if(!($stmtcheck->rowCount() > 0)) {
    echo "Table does'nt exists.";
  }
  else {
    echo "Table exists.";
    //storing todo
    // query string
  $queryInsert = "INSERT INTO todos (todo_text) VALUES (:todo);";

  // preparing mysql statement with query string which right now does'nt have data in it
  $stmtInsert = $pdo->prepare($queryInsert);
  
  // binding data to statment placeholders
  $stmtInsert->bindParam("todo", $new_todo);

  // telling it to execute the given statement with data
  $stmtInsert->execute();
  $stmtInsert = null;
  }
    // closing connection & setting query to null
    $pdo = null;
    $stmtcheck = null;
    $querycheck = null;
    header("Location: ../index.php");
  
  } catch (PDOException $e) {
    echo "Insertion failed: " . $e->getMessage();
    header("Location: ../index.php");
  }
}
else {
  header("Location: ../index.php");
}

 