<html>
<head>
    <title>PHP Calculator</title>
</head>
<body>
    <h2>Simple Calculator</h2>
    <form method="post">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1"><br><br>

        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2"><br><br>

        <label for="operator">Operator:</label>
        <select id="operator" name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>


<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get the inputs from the form
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    // Validate the inputs (optional but recommended)
    if (is_numeric($num1) && is_numeric($num2)) 
	{
        // Perform the calculation based on the operator
        if ($operator == "+") {
            $result = $num1 + $num2;
        } elseif ($operator == "-") {
            $result = $num1 - $num2;
        } elseif ($operator == "*") {
            $result = $num1 * $num2;
        } elseif ($operator == "/") {
            // Check for division by zero
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero!";
            }
        } else {
            $result = "Invalid operator!";
        }

        // Display the result
        echo "Result: " . $result;
    } else {
        echo "Please enter valid numbers.";
    }
}

?>


