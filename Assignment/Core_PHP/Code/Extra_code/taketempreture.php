<html>
<head>
<title>Temperature Converter</title>
</head>
<body>

<h1>Temperature Converter</h1>

<form method="post">
  <label for="temperature">Enter Temperature:</label>
  <input type="text" id="temperature" name="temperature" required><br><br>

  <label for="unit">Select Unit:</label>
  <select id="unit" name="unit" required>
    <option value="C">Celsius (°C)</option>
    <option value="F">Fahrenheit (°F)</option>
  </select><br><br>

  <input type="submit" value="Convert">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = $_POST['temperature'];
    $unit = strtoupper($_POST['unit']);

    function convertTemperature($temp, $unit) {
        if (!is_numeric($temp)) {
            return "Error: Invalid temperature input. Please enter a number.";
        }

        if ($unit != "C" && $unit != "F") {
            return "Error: Invalid unit. Please enter 'C' or 'F'.";
        }

        if ($unit == "C") {
            $fahrenheit = ($temp * 9/5) + 32;
            return "$temp °C is equal to " . number_format($fahrenheit, 2) . " °F"; // Format to 2 decimal places
        } elseif ($unit == "F") {
            $celsius = ($temp - 32) * 5/9;
            return "$temp °F is equal to " . number_format($celsius, 2) . " °C"; // Format to 2 decimal places
        }
    }

    // Call the function and display the result
    $result = convertTemperature($temp, $unit);
    echo "<p>$result</p>";
}
?>


