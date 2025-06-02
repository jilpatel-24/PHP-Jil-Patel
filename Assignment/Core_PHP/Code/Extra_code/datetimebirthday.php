<?php
function calculateTimeDifference($date1, $date2) 
{
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%a'); 
}

$today = "today";
$nextBirthday = "2025-06-24"; 

$daysUntilBirthday = calculateTimeDifference($today, $nextBirthday);

echo "Today is: " . date("Y-m-d") . "<br>";
echo "Next Birthday: " . $nextBirthday . "<br>";
echo "Days until next birthday: " . $daysUntilBirthday . " days<br>";
?>
