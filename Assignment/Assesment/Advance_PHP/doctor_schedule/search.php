<?php
$data = json_decode(file_get_contents("schedules.json"), true);

$department = $_GET['department'] ?? '';
$availability = $_GET['availability'] ?? '';

$results = array_filter($data, function ($item) use ($department, $availability) 
{
    $match = true;
    if ($department !== '') 
	{
        $match = $match && stripos($item['department'], $department) !== false;
    }
    if ($availability !== '') 
	{
        $match = $match && stripos($item['availability'], $availability) !== false;
    }
    return $match;
});

header("Content-Type: application/json");
echo json_encode(array_values($results));
?>
