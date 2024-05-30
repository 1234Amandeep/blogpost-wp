<?php

declare(strict_types=1);

function remove_todo(object $pdo, int $todo_num)
{
  $queryDelete = "DELETE FROM todos WHERE id = :todo_num;";

  $stmt = $pdo->prepare($queryDelete);
  $stmt->bindParam("todo_num", $todo_num);
  $stmt->execute();
}

function flip_todo(object $pdo, int $todo_num, int $todo_status)
{
  $queryUpdate = "UPDATE todos SET checked = :todo_status WHERE id = :todo_num;";

  $stmt = $pdo->prepare($queryUpdate);
  $stmt->bindParam("todo_status", $todo_status);
  $stmt->bindParam("todo_num", $todo_num);
  $stmt->execute();
}