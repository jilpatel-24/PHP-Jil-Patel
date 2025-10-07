<?php

class Calculator 
{

    public function calculate() {
        $numArgs = func_num_args(); // Get the number of arguments passed to the function
        $args = func_get_args();   // Get an array of all the arguments

        if ($numArgs < 2) {
            return "Error: At least two numbers are required for calculation.";
        }

        $operation = $args[0]; // The first argument is the operation type (+, -, *)

        if (!in_array($operation, ['+', '-', '*'])) 
		{
            return "Error: Invalid operation. Use '+', '-', or '*'.";
        }

        $result = $args[1]; // Initialize the result with the second argument

        for ($i = 2; $i < $numArgs; $i++) 
		{
            if (!is_numeric($args[$i])) 
			{
                return "Error: All operands must be numbers.";
            }
            switch ($operation) 
			{
                case '+':
                    $result += $args[$i];
                    break;
                case '-':
                    $result -= $args[$i];
                    break;
                case '*':
                    $result *= $args[$i];
                    break;
            }
        }

        return $result;
    }
}

$calculator = new Calculator();

echo "Addition: " . $calculator->calculate('+', 10, 5, 3) . "<br>";  // addition

echo "Subtraction: " . $calculator->calculate('-', 20, 5, 2) . "<br>";  // subtraction

echo "Multiplication: " . $calculator->calculate('*', 2, 3, 4) . "<br>";  // multiplication

echo "Error (Invalid Operation): " . $calculator->calculate('/', 10, 2) . "<br>";  // Error Handling
echo "Error (Not Enough Arguments): " . $calculator->calculate('+') . "<br>"; // Output: Error: At least two numbers are required for calculation.
echo "Error (Non-Numeric Argument): " . $calculator->calculate('+', 10, 5, "abc") . "<br>"; // Output: Error: All operands must be numbers.

?>
