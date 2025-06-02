<?php
function factorialRecursive(int $n): int 
{
    if ($n <= 1) 
	{
        return 1;
    }
    return $n * factorialRecursive($n - 1);
}



function factorialIterative(int $n): int
{
    $result = 1;
    for ($i = 2; $i <= $n; $i++) 
	{
        $result *= $i;
    }
    return $result;
}



$number = 10; 

// Recursive
$startTimeRecursive = microtime(true);
$recursiveResult = factorialRecursive($number);
$endTimeRecursive = microtime(true);
$recursiveTime = $endTimeRecursive - $startTimeRecursive;

// Iterative
$startTimeIterative = microtime(true);
$iterativeResult = factorialIterative($number);
$endTimeIterative = microtime(true);
$iterativeTime = $endTimeIterative - $startTimeIterative;

echo "Factorial of $number:<br>";
echo "Recursive Result: $recursiveResult, Time: $recursiveTime seconds<br>";
echo "Iterative Result: $iterativeResult, Time: $iterativeTime seconds<br>";
?>
