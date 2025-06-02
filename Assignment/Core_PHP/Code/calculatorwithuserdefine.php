<html>
<head>
  <title>PHP Calculator</title>
</head>
<body>

  <h2>PHP Calculator</h2>

  <form method="post">
    <label for="num1">Number 1:</label>
    <input type="number" name="num1" id="num1" required><br><br>

    <label for="num2">Number 2:</label>
    <input type="number" name="num2" id="num2" required><br><br>

    <label for="operation">Operation:</label>
    <select name="operation" id="operation">
      <option value="add">Add</option>
      <option value="subtract">Subtract</option>
      <option value="multiply">Multiply</option>
      <option value="divide">Divide</option>
    </select><br><br>

    <input type="submit" value="Calculate">
  </form>
  
<?php if ($result != ""): ?>
    <h3>Result: <?php echo $result; ?></h3>
<?php endif; ?>


</body>
</html>


<?php

// Function to add two numbers
function add($num1, $num2) {
  return $num1 + $num2;
}

// Function to subtract two numbers
function subtract($num1, $num2) {
  return $num1 - $num2;
}

// Function to multiply two numbers
function multiply($num1, $num2) {
  return $num1 * $num2;
}

// Function to divide two numbers
function divide($num1, $num2) {
  if ($num2 == 0) {
    return "Error: Division by zero!";
  }
  return $num1 / $num2;
}

// Get user input
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$operation = $_POST["operation"];

// Perform the calculation based on the selected operation
$result = "";
if (is_numeric($num1) && is_numeric($num2)) {
  switch ($operation) 
  {
    case "add":
      $result = add($num1, $num2);
      break;
    case "subtract":
      $result = subtract($num1, $num2);
      break;
    case "multiply":
      $result = multiply($num1, $num2);
      break;
    case "divide":
      $result = divide($num1, $num2);
      break;
    default:
      $result = "Invalid operation!";
  }
} 
else 
{
  $result = "Please enter valid numbers.";
}

?>

