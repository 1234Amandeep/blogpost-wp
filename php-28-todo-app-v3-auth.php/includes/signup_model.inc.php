<?php

declare(strict_types=1);

function get_email(object $pdo, string $email) 
{
  $querySelect = "SELECT email FROM users WHERE email = :email;";

  $stmt = $pdo->prepare($querySelect);
  $stmt->bindParam("email", $email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function get_username(object $pdo, string $username) 
{
  $querySelect = "SELECT username FROM users WHERE username = :username;";

  $stmt = $pdo->prepare($querySelect);
  $stmt->bindParam("username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function get_user(object $pdo, string $username) 
{
  $querySelect = "SELECT * FROM users WHERE username = :username;";

  $stmt = $pdo->prepare($querySelect);
  $stmt->bindParam("username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function set_user(object $pdo, string $username, string $pwd, string $email)
{
  $queryInsert = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

  $stmt = $pdo->prepare($queryInsert);
  $stmt->bindParam("username", $username);

  $options = [
    'cost' => 12,
  ];
  $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

  $stmt->bindParam("pwd", $hashedPwd);
  $stmt->bindParam("email", $email);
  $stmt->execute();

  // getting user
  $user = get_user($pdo, $username);
  return $user;
}