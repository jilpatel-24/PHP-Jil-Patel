<?php

	$myArray = array("banana", "apple", "orange", "grape", "kiwi");

	
	sort($myArray); // Sort array in ascending order (case-sensitive)
	echo "<br> Sorted array (sort()): " ;
	print_r($myArray);

	
	rsort($myArray); // Sort array in descending order (case-sensitive)
	echo "<br> Sorted array (rsort()): " ;
	print_r($myArray);

	
	$myAssocArray = array("a" => "jil", "b" => "dhruvin", "c" => "zianil");

	
	asort($myAssocArray); // Sort associative array by value in ascending order (case-sensitive)
	echo "<br> Sorted associative array by value (asort()):  ";
	print_r($myAssocArray);

	
	ksort($myAssocArray); // Sort associative array by key in ascending order
	echo "<br> Sorted associative array by key (ksort()): ";
	print_r($myAssocArray);

?>
