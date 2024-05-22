<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-6</title>
</head>

<body>
  <form action="./includes/formhandler.php" method="post">
    <label for="firstname">Firstname?</label>
    <br>
    <input type="text" name="firstname" id="firstname">
    <br><br>
    <label for="lastname">Lastname?</label>
    <br>
    <input type="text" name="lastname" id="lastname">
    <br><br>
    <label for="favouritepet">Favouritepet?</label>
    <br>
    <select name="favouritepet" id="favouritepet">
      <option value="none">none</option>
      <option value="cat">Cat</option>
      <option value="dog">Dog</option>
      <option value="bird">Bird</option>
    </select>
    <br><br>
    <button type="submit">submit</button>
  </form>
</body>

</html>