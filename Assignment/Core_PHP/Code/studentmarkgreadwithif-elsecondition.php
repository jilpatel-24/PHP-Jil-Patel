<?php

	$marks = 95;

	if ($marks >= 90) 
	{
		$grade = "A";
	} 
	elseif ($marks >= 80) 
	{
		$grade = "B";
	} 
	elseif ($marks >= 70) 
	{
		$grade = "C";
	} 
	elseif ($marks >= 60) 
	{
		$grade = "D";
	} 
	else {
		$grade = "Fail";
	}

	echo "Student's Grade: " .$grade;

?>
