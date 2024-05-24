<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calcultor App (php-9)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="./css/main.css">
</head>

<body>
  <div class="display-2 text-center mt-3"><u>Calculator</u></div>

  <div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
      class="container d-flex justify-content-center flex-column">
      <label for="operand1" target="operand1">Operand1</label>
      <input type="number" id="operand1" name="operand1" placeholder="1234">
      <br>
      <div class="select-container">
        <select name="operator" id="operator">
          <option value="add">+</option>
          <option value="subtract">-</option>
          <option value="multiply">*</option>
          <option value="divide">/</option>
        </select>
        <label for="operator">Operator</label>
      </div>
      <br>
      <label for="operand2" target="operand2">Operand2</label>
      <input type="number" id="operand2" name="operand2" placeholder="1234">
      <br>
      <button type="submit" class="btn btn-dark">calculate</button>
    </form>
  </div>

  <?php 
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // validating & sanitizing data
    $operand1 = filter_input(INPUT_POST, "operand1", FILTER_SANITIZE_NUMBER_FLOAT);  
    $operator = htmlspecialchars($_POST["operator"]);  
    $operand2 = filter_input(INPUT_POST, "operand2", FILTER_SANITIZE_NUMBER_FLOAT);  
    
    // checking if data is empty
    if(!empty($operand1) && !empty($operand2) && !empty($operator)) {
      $result = 0;

      switch($operator) {
        case "add":
          $result = $operand1 + $operand2;
          break;
        case "subtract":
          $result = $operand1 - $operand2;
          break;
        case "multiply":
          $result = $operand1 * $operand2;
          break;
        case "divide":
          $result = $operand1 / $operand2;
          break;
        default:
          echo "<h4 class='text-danger text-center'>Something went wrong!</h4>";
        }
        
        echo "<h4 class='text-success text-center mt-5'>" . $result . "</h4>";
        
      }
      else {
      echo "<h4 class='text-danger text-center mt-5'>Please fill all feilds correctly.</h4>";
      
    }
  }
  ?>



  </div>
</body>

</html>