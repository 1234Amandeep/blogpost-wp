<?php

$dsn = "mysql:host=localhost;dbname=todoapp_v3_auth";
$dbusername = "root";
$dbpassword = "";

// trying to connect with db
try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e.getMessage();
  header("Location: ../index.php");
  die();
}