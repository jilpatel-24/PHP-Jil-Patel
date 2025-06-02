<?php

echo "<table border='2'>";

for ($row = 1; $row <= 8; $row++) 
{
    echo "<tr>"; // Start a new table row

    for ($col = 1; $col <= 8; $col++) 
	{
        if (($row + $col) % 2 == 0) 
		{
            $color = "white";
        } 
		else 
		{
            $color = "black";
        }
        echo "<td width='30' height='30' bgcolor='" . $color . "'></td>";
    }

    echo "</tr>";
}

echo "</table>";

?>
