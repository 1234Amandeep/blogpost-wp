<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-5</title>
</head>

<body>
  <h1>Superglobals predefined variables set by PHP INTERPRETER OR WEB SERVER</h1>
  <?php 
  $foo = "Foo in global name space";
  echo "foo: ".htmlspecialchars($GLOBALS["foo"]);
  ?>
  <br>
  <?php 

  echo "host: ".htmlspecialchars($_SERVER["SERVER_NAME"]);
  ?>
</body>

</html>