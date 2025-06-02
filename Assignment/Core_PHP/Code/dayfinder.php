<?php

$dayOfWeek = date("w");


if ($dayOfWeek == 0) 
{
    echo "Happy Sunday!";
} 
else 
{
    echo "Today is not Sunday."; 
}

?>
