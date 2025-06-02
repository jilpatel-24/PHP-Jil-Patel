<html>
<head>
<title>PHP Calculator</title>
</head>
<body>

</body>
</html>

    <h2>PHP Calculator</h2>
    <form method="post">
		<label >Enter Number:</label>
        <input type="text" name="num1" >
		<br><br>
        <label >Enter Number:</label>
        <input type="text" name="num2" >
		<br><br>
		<select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>
            <option value="%">%</option>
            <option value="sqrt">sqrt</option>
        </select>
		<br><br>
        <button type="submit">Calculate</button>
    </form>
	</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $operator = $_POST["operator"];
        $num2 = $_POST["num2"];
        $result = null;
        $error = null;

        if (!is_numeric($num1) || ($operator != "sqrt" && !is_numeric($num2))) {
            $error = "Error: Invalid number input.";
        } else {
            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 == 0) {
                        $error = "Error: Division by zero.";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                case "^":
                    $result = pow($num1, $num2);
                    break;
                case "%":
                    if ($num2 == 0) {
                        $error = "Error: Modulo by zero.";
                    } else {
                        $result = fmod($num1, $num2);
                    }
                    break;
                case "sqrt":
                    if ($num1 < 0) {
                        $error = "Error: Cannot calculate the square root of a negative number.";
                    } else {
                        $result = sqrt($num1);
                    }
                    break;
                default:
                    $error = "Error: Invalid operator.";
            }
        }

        if ($error) {
            echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
        } elseif ($result !== null) {
            echo "<p class='result'>Result: " . number_format($result, 2) . "</p>";
        }
    }
    ?>
