<?php

declare(strict_types=1);

function check_user_signedup()
{
  echo (isset($_SESSION['user_id'])) ? $_SESSION['user_username'] . "'s todos" : "Todos";
}

function check_signup_errors()
{
  if(isset($_SESSION['signup_errors'])) {
    $errors = $_SESSION['signup_errors'];
    echo '<br>';
    foreach($errors as $error) {
      echo '<p class="text-center text-danger">' . $error . '</p>';
      echo '<br>';
    }
    unset($_SESSION['signup_errors']);
  } else if(isset($_GET['signup'])) {
    echo '<p class="text-center text-success">signup ' . $_GET['signup'] . '!</p>';
  }
}