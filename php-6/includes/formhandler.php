<?php
// checking that its a valid post request or a malcious url changing req.
if("POST" == $_SERVER["REQUEST_METHOD"]) {
  // sanitizing data coming from user
  $fname = htmlspecialchars($_POST["firstname"]);
  // checking if user forgot to enter firstname
  if(empty($fname)) {
    header("Location: ../index.php");
    exit();
    // not going any furthur if user forgot to enter firstname and sending him back to root page so that he can enter firstname again
  }
  echo $fname;
  echo "<br/>";
  
  $lName = htmlspecialchars($_POST["lastname"]);
  echo $lName;
  
  echo "<br/>";
  
  $favPet = htmlspecialchars($_POST["favouritepet"]);
  echo $favPet;
  
  header("Location: ../index.php");
  
  
} else {
  header("Location: ../index.php");
}