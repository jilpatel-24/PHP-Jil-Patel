<?php

$number = 25; 

if ($number > 0) 
{
    echo "The number is positive. ";

    if ($number % 2 == 0) 
	{
        echo "It is also an even number.\n";
    } 
	else 
	{
        echo "It is also an odd number.\n";
    }
} 
elseif ($number < 0) 
{
    echo "The number is negative. ";

    if ($number % 2 == 0) 
	{
        echo "It is also an even number.\n"; // This will not be reached for negative numbers
    } 
	else 
	{
        echo "It is also an odd number.\n"; // This will not be reached for negative numbers
    }
} 
else 
{
    echo "The number is zero.\n";
}

?>
