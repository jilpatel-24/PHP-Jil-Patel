<?php

$rows = 5;
for ($i = 1; $i <= $rows; $i++) 
{
    echo str_repeat("  ", $rows - $i).str_repeat("* ", 2 * $i - 1)."<br>";
}
?>