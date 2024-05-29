<?php

declare(strict_types=1);

function get_user(object $pdo, string $username) {
  $querySelect = "SELECT * FROM users WHERE username = :username;";

  $stmtSelect = $pdo->prepare($querySelect);
  $stmtSelect->bindParam("username", $username);
  $stmtSelect->execute();

  $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

  return $result;
}