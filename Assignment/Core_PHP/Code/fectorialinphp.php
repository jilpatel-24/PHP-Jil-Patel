<?php
function factorial(int $n): int 
{
    if ($n <= 1) 
	{
        return 1;
    } else 
	{
        return $n * factorial($n - 1);
    }
}

$number = 4;
$result = factorial($number);
echo "The factorial of $number is: " . $result; 
?>
