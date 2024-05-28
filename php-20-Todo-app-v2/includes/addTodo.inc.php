<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
  // connecting to db
  require_once "dbh.inc.php";
  
  // extracting new-todo from post req.
  $new_todo = $_POST["new-todo"];
  
  // trying to store it inside db
  try {
    // checking if the todos table exists inside db

    $querycheck = "SHOW TABLES LIKE :table;";

    $stmtcheck = $pdo->prepare($querycheck);

  // binding data to statment placeholders
  $stmtcheck->bindParam("table", $table);

  // telling it to execute the given statement with data
  $stmtcheck->execute();

  if(!($stmtcheck->rowCount() > 0)) {
    echo "Table does'nt exists.";
    $queryCreate = "CREATE TABLE " . $table . " (
	id INT(11) NOT NULL AUTO_INCREMENT,
    todo_text TEXT NOT NULL,
    checked TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);";

  $pdo->exec($queryCreate);
  echo "table created successfully: " . $table;
  $queryCreate = null;

  // Inserting data after creating table
  $queryInsert = "INSERT INTO " . $table . " (todo_text) VALUES (:todo);";

  // preparing mysql statement with query string which right now does'nt have data in it
  $stmtInsert = $pdo->prepare($queryInsert);
  
  // binding data to statment placeholders
  $stmtInsert->bindParam("todo", $new_todo);

  // telling it to execute the given statement with data
  $stmtInsert->execute();
  $stmtInsert = null;
  header("Location: ../index.php");
  die(); 
  }
  else {
    echo "Table exists.";
    //storing todo
    // query string
  $queryInsert = "INSERT INTO " . $table . " (todo_text) VALUES (:todo);";

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
    die();
  
  } catch (PDOException $e) {
    echo "Insertion failed: " . $e->getMessage();
    header("Location: ../index.php");
  }
}
else {
  header("Location: ../index.php");
}

 