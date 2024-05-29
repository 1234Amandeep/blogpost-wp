<?php
declare(strict_types = 1);

function check_signup_errors() {
  if(isset($_SESSION['signup_errors'])) {
    $signup_errors = $_SESSION['signup_errors'];
    echo '<div class="error-container mt-5">';
    foreach($signup_errors as $signup_error) {
      echo "<br>";
      echo '<p class="text-center text-danger"> ' . $signup_error . '</p>';
    }
    echo '</div>';
  
    unset($_SESSION['signup_errors']);
  }
  else if(isset($_GET['signup'])) {
    // showcasing success_msg
    echo "<br>";
    echo '<p class="text-center text-success"> signup ' . $_GET["signup"] . '</p>';
  }
}