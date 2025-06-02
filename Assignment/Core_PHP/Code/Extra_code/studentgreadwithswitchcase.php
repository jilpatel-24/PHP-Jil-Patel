<?php

$grade = 'A'; 

switch (strtoupper($grade)) 
{
    case 'A':
    case 'B':
        echo "Excellent!<br>";
        break;
    case 'C':
        echo "Good.<br>";
        break;
    case 'D':
        echo "Needs improvement.<br>";
        break;
    case 'F':
        echo "Fail.<br>";
        break;
    default:
        echo "Invalid grade.<br>";
}

?>
