<?php

// dummy user data to insert into db
$username = "JaneDoe777";
$pwd = "meinkubtaun";
$email = "tukyakregajanke@gmail.com";

// trying to query db
try {
  // importing db connection obj
  require_once "dbh.inc.php";
  echo "after connecting";


  // query string
  $query = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd);";

  // preparing mysql statement with query string which right now does'nt have data in it
  $stmt = $pdo->prepare($query);

  // binding data to statment placeholders
  $stmt->bindParam("username", $username);
  $stmt->bindParam("pwd", $pwd);
  $stmt->bindParam("email", $email);

  // telling it to execute the given statement with data
  $stmt->execute();

  // closing connection & setting query to null
  $pdo = null;
  $query = null;

  // sending user back to the root page & stoping any further execution of this script
  header("Location: ../index.php");
  die();
} catch (PDOException $e) {
  die("Query failed: " . $e->getMessage());
}