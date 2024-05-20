<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-4</title>
</head>

<body>
  <?php 
    $userObj = new stdClass();
    $userObj->name = "Amandeep Singh";
    $userObj->email = "samandeep82057@gmail.com";
    $userObj->dob = "20-05-2003";
    $isVerified = false;
  ?>

  <p>After some authentication procedure...</p>

  <?php  $isVerified = true; ?>
  <?php if($isVerified) {; ?>
  <div class="user-details-container">
    <h1>USER DETAILS : </h1>
    <h4 class="user-name"><?php echo $userObj->name; ?></h4>
    <h4 class="user-email"><?php echo $userObj->email; ?></h4>
    <h4 class="user-dob"><?php echo $userObj->dob; ?></h4>
  </div>
  <?php } else {; ?>
  <h1>Authentication failed</h1>
  <?php }; ?>
</body>

</html>