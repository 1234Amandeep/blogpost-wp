<?php
declare(strict_types = 1);

function get_username(object $pdo, string $username) {
  $querySelect = "SELECT username FROM users WHERE username = :username;";

  $stmtSelect = $pdo->prepare($querySelect);
  $stmtSelect->bindParam("username", $username);
  $stmtSelect->execute();

  $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function get_email(object $pdo, string $email) {
  $querySelect = "SELECT email FROM users WHERE email = :email;";

  $stmtSelect = $pdo->prepare($querySelect);
  $stmtSelect->bindParam(":email", $email);
  $stmtSelect->execute();

  $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function set_user(object $pdo, string $username, string $pwd, string $email) {
  $queryInsert = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

  $stmtSelect = $pdo->prepare($queryInsert);
  $stmtSelect->bindParam(":username", $username);

  $options = [
    'cost' => 12,
  ];
  $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

  $stmtSelect->bindParam(":pwd", $hashedPwd);
  $stmtSelect->bindParam(":email", $email);
  $stmtSelect->execute();
}