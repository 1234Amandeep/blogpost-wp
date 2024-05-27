<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // connecting to db
  require_once "dbh.inc.php";

  // post req. data
  $form_id = $_POST["form_id"];
   
  
  if(isset($_POST["delete-btn"])) {
    // delete clicked!
    $queryDelete = "DELETE FROM todos WHERE id = :formid;";

    $stmtDelete = $pdo->prepare($queryDelete);
    $stmtDelete->bindParam("formid", $form_id);
    $stmtDelete->execute();

    $queryDelete = null;
    $stmtDelete = null;
    header("Location: ../index.php");
    die();
  }
  else if(isset($_POST["completed"])) {
    // status is turned on
    echo "status is turned on";
    $checked = 1;
    $queryUpdateOn = "UPDATE todos SET status = :checked WHERE id = :formid;";

    $stmtUpdateOn = $pdo->prepare($queryUpdateOn);

    $stmtUpdateOn->bindParam("checked", $checked);
    $stmtUpdateOn->bindParam("formid", $form_id);

    $stmtUpdateOn->execute();

    $stmtUpdateOn = null;
    $queryUpdateOn = null;
    header("Location: ../index.php");
    die();
  }
  else {
    // status is turned off
    echo "status is turned off";
    $checked = 0;
    $queryUpdateOff = "UPDATE todos SET status = :checked WHERE id = :formid;";

    $stmtUpdateOff = $pdo->prepare($queryUpdateOff);

    $stmtUpdateOff->bindParam("checked", $checked);
    $stmtUpdateOff->bindParam("formid", $form_id);

    $stmtUpdateOff->execute();

    $stmtUpdateOff = null;
    $queryUpdateOff = null;
    header("Location: ../index.php");
    die();
  }
}
else {
  header("Location: ../index.php");
}