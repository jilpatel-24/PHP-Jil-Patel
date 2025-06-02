<html>
<head>
    <title>Color Display</title>
</head>
<body>
    <h2>Enter a Color:</h2>
    <form method="post">
        <label for="color">Color (red, green, blue):</label>
        <input type="text" id="color" name="color"><br><br>
        <input type="submit" value="Show Color">
    </form>
</body>
</html>


<?php

$colorInput = isset($_POST["color"]) ? strtolower($_POST["color"]) : "";

if ($colorInput == "red") {
    $colorName = "Red";
} elseif ($colorInput == "green") {
    $colorName = "Green";
} elseif ($colorInput == "blue") {
    $colorName = "Blue";
} else {
    $colorName = "Invalid color";
}

// Display the color name
echo "You entered: " . $colorInput . "<br>";
echo "Color: " . $colorName;

?>



