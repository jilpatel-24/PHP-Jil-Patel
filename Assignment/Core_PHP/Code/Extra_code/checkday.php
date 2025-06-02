<?php

$timezone = 'Asia/Kolkata';

date_default_timezone_set($timezone);

// Get current day name
$day = date('l'); // 'l' gives full day name

echo "Current Time Zone: $timezone<br>";
echo "Today is: $day<br>";

if ($day === 'Sunday') 
{
    echo "Happy Sunday!";
} else {
    echo "Have a great day!";
}
?>
