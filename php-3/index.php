<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-3</title>
</head>

<body>
  <h2>USER DETAILS :</h2>
  <?php
      //  if clause,
      // verified show user data, if not echo not verified
      if(true) {
    ?>
  <div class="user-details-container">
    <h4 class="username">
      <?php
      echo "1234amandeep";
      ?>
    </h4>
    <h4 class="useremail">
      <?php
      echo "samandeep8057@gmail.com";
      ?>
    </h4>
    <h4 class="userdob">
      <?php
      echo "20-05-2003";
      ?>
    </h4>


  </div>
  <?php 
    // else clause
    } else {?>
  <h4>User not verified</h4>
  <?php }?>
  <p>rest of the content...</p>
</body>

</html>