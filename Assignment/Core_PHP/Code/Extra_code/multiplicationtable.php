<?php

for ($i = 1; $i <= 10; $i++) 
{
    for ($j = 1; $j <= 10; $j++) 
	{   
        $product = $i * $j;

        printf("%4d", $product);
    }

    echo "<br>";
}
?>
