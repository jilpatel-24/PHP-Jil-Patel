<?php
require_once "doctorschedule.php";

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) 
{
    $file = fopen($_FILES['file']['tmp_name'], "r");

    $schedules = [];
    
    fgetcsv($file); // Skip CSV header

    while (($row = fgetcsv($file)) !== false) 
	{
        $doctor = new DoctorSchedule($row[0], $row[1], $row[2]);
        $schedules[] = $doctor->toArray();
    }
    fclose($file);

    file_put_contents("schedules.json", json_encode($schedules, JSON_PRETTY_PRINT));

    echo "CSV uploaded and saved successfully!";
} 
else 
{
    echo "Error uploading file!";
}
?>
