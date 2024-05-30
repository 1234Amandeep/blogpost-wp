<?php

declare(strict_types=1);

function check_login_errors() {
  if(isset($_SESSION['login_errors'])) {

    $errors = $_SESSION['login_errors'];
    echo '<br>';
    foreach($errors as $error) {
      echo '<p class="text-center text-danger">' . $error . '</p>';
    }

    unset($_SESSION['login_errors']);
  }
}