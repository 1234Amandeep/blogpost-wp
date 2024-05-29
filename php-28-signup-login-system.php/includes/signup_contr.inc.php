<?php

declare(strict_types = 1);

function is_user_input_empty(string $username, string $pwd, string $email) {
  if(empty($username) || empty($pwd) || empty($email)) {
    return true;
  } else {
    return false;
  }
}

function is_invalid_email(string $email) {
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  } else {
    return true;
  }
}

function is_username_already_taken(object $pdo, string $username) {
  // if username exists in db get_username will return an array which will be seen as truthy
  if(get_username($pdo, $username)) { 
    return true;
  } else {
    return false;
  }
}
function is_email_already_used(object $pdo, string $email) {
  // if username exists in db get_username will return an array which will be seen as truthy
  if(get_email($pdo, $email)) { 
    return true;
  } else {
    return false;
  }
}
function create_user(object $pdo, string $username, string $pwd, string $email) {
  set_user($pdo, $username, $pwd, $email);
}