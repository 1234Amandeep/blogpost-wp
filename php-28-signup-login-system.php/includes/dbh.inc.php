<?php

$table = "users";
$dsn = "mysql:host=localhost;dbname=signup_login";
$dbusername = "root";
$dbpassword = "";

// trying to connect to db
try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  header("Location: ../index.php");
  die();
}