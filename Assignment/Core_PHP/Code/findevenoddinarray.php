<?php

	$myArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);

	$oddCount = 0;
	$evenCount = 0;

	foreach ($myArray as $number) 
	{
		if ($number % 2 == 0) 
		{
			$evenCount++; // Increment even count
		} 
		else 
		{
			$oddCount++; // Increment odd count
		}
	}

	echo "Number of odd elements: " . $oddCount . "<br>";
	echo "Number of even elements: " . $evenCount . "<br>";
?>
