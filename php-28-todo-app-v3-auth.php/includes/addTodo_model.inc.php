<?php

declare(strict_types=1);

function set_todo(object $pdo, int $user_id, string $new_todo)
{
  $queryInset = "INSERT INTO todos (todo_text, users_id) VALUES (:new_todo, :user_id);";

  $stmt = $pdo->prepare($queryInset);
  $stmt->bindParam("new_todo", $new_todo);
  $stmt->bindParam("user_id", $user_id);
  $stmt->execute();
}

function get_todos(object $pdo, int $user_id)
{
  $querySelect = "SELECT * FROM todos WHERE users_id = :user_id;";

  $stmt = $pdo->prepare($querySelect);
  $stmt->bindParam("user_id", $user_id);
  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}