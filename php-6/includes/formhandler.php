<?php
// checking that its a valid post request or a malcious url changing req.
if("POST" == $_SERVER["REQUEST_METHOD"]) {
  // sanitizing data coming from user
  $fname = htmlspecialchars($_POST["firstname"]);
  echo $fname;
  echo "<br/>";
  
  $lName = htmlspecialchars($_POST["lastname"]);
  echo $lName;
  
  echo "<br/>";
  
  $favPet = htmlspecialchars($_POST["favouritepet"]);
  echo $favPet;
  
} else {
  header("Location: ../index.php");
}