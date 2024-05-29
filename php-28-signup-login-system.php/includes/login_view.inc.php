<?php

declare(strict_types=1);

function check_login_errors() {
  if(isset($_SESSION['login_errors'])) {
    $login_errors = $_SESSION['login_errors'];
    echo '<div class="error-container mt-5">';
    foreach($login_errors as $login_error) {
      echo "<br>";
      echo '<p class="text-center text-danger"> ' . $login_error . '!</p>';
    }
    echo '</div>';
  
    unset($_SESSION['login_errors']);
  }
  else if(isset($_GET['login'])){
    // showcasing success_msg
    echo "<br>";
    echo '<p class="text-center text-success"> login ' . $_GET["login"] . '!</p>';
  }
}