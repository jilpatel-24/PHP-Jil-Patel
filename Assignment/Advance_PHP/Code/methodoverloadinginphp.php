<?php

class Calculator 
{
    public function __call($method, $arguments) 
	{
        if ($method == 'add') 
		{
            $numArgs = count($arguments);

            if ($numArgs == 2) 
			{
                // Method with two arguments
                return $arguments[0] + $arguments[1];
            } elseif ($numArgs == 3) {
                // Method with three arguments
                return $arguments[0] + $arguments[1] + $arguments[2];
            } else {
                return "Invalid number of arguments for add method";
            }
        } 
		else 
		{
            return "Method not found";
        }
    }
}


$calc = new Calculator(); // Creating Calculator class


$result1 = $calc->add(5, 3); // Calling the add method with two arguments
echo "Result with two arguments: " . $result1 . "<br>";

$result2 = $calc->add(5, 3, 2); // Calling the add method with three arguments
echo "Result with three arguments: " . $result2 . "<br>";

$result3 = $calc->multiply(5, 3); // Attempting to call a non-existent method
echo "Result of multiply: " . $result3 . "<br>";

?>
