<?php

declare(strict_types=1);

function is_input_empty(string $new_todo)
{
  if(empty($new_todo)) {
    return true;
  } else {
    return false;
  }
}

function create_todo(object $pdo, int $user_id, string $new_todo)
{
  set_todo($pdo, $user_id, $new_todo);
}