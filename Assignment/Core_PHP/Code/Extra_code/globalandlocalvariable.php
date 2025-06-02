<?php

$p=50; //Local

echo $p."<br>"; //Display Local Variable

function display()    
{
	$a=25; // local
	$b=50;		
	echo $GLOBALS['c']=$a+$b . "<br>";  // CONVERT LOCAL TO GLOBAL
}
display();

echo $c; //Diaplay Global Variable

?>