<?php
class DoctorSchedule 
{
    public $name;
    public $department;
    public $availability;

    public function __construct($name, $department, $availability) 
	{
        $this->name = $name;
        $this->department = $department;
        $this->availability = $availability;
    }

    public function toArray() 
	{
        return 
		[
            "name" => $this->name,
            "department" => $this->department,
            "availability" => $this->availability
        ];
    }
}
?>
