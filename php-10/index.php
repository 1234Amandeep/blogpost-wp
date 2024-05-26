<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-10</title>
  <style>
  body {
    background-color: #433;
    color: wheat;
  }
  </style>
</head>

<body>
  <h1>Array's in php</h1>
  <?php 

  // empty Array declaration
  $arr = [];

  // print whole array in browser
  // print_r($arr);
  
  // populating above array
  $arr[0] = "first_element";
  $arr[1] = "second_element";
  $arr[2] = "third_element";
  // print_r($arr);

  // echoing single element of an array
  echo $arr[0] . "<br>";
  echo $arr[1] . "<br>";
  echo $arr[2] . "<br>";

  // Getting length of an array
  echo count($arr);
  ?>
</body>

</html>