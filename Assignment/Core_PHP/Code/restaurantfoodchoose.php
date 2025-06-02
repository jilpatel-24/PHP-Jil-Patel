<html>
<head>
    <title>Menu Selection</title>
</head>
<body>
    <h2>Choose a Menu Item:</h2>
    <form method="post">
        <select name="selection">
            <option value="1">Starter</option>
            <option value="2">Main Course</option>
            <option value="3">Dessert</option>
        </select>
        <input type="submit" value="Show Dish">
    </form>
</body>
</html>


<?php

// Get the user's selection (e.g., from a form)
// For this example, let's assume the user selects a number from 1 to 3
$selection = isset($_POST["selection"]) ? $_POST["selection"] : 1;


switch ($selection) 
{
    case 1:
        $category = "Starter";
        $dish = "Bruschetta,Soup";
        break;
    case 2:
        $category = "Main Course";
        $dish = "Grilled Salmon with Roasted Vegetables";
        break;
    case 3:
        $category = "Dessert";
        $dish = "Chocolate Lava Cake";
        break;
    default:
        $category = "Invalid Selection";
        $dish = "Please choose a valid option.";
}

// Display the category and dish
echo "Category: " . $category . "<br>";
echo "Dish: " . $dish;

?>



