<?php

declare(strict_types=1);

function get_user(object $pdo, string $username)
{
  $querySelect = "SELECT * FROM users WHERE username = :username;";

  $stmt = $pdo->prepare($querySelect);
  $stmt->bindParam("username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}