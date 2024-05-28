<?php

$table = "todos";
$dbname = "todoapp_v2";
$dsn = "mysql:host=localhost;dbname=" . $dbname;
$dbusername = "root";
$dbpassword = "";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed : " . $e->getMessage();
  header("Location: ../index.php");
}