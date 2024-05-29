<?php
declare(strict_types = 1);

function showcase_input_errors() {
  if(isset($_SESSION['input_errors'])) {
    $input_errors = $_SESSION['input_errors'];
    echo '<div class="error-container mt-5">';
    foreach($input_errors as $input_error) {
      echo "<br>";
      echo '<p class="text-center text-danger"> ' . $input_error . '</p>';
    }
    echo '</div>';
  
    unset($_SESSION['input_errors']);
  }
  else {
    // showcasing success_msg
    echo "<br>";
    echo '<p class="text-center text-success"> ' . $_GET["signup"] . '</p>';
  }
}