<?php

class Student 
{
    public $name;
    public $age;
    public $grade;

    
    public function __construct($name, $age, $grade)  // onstructor 
	{
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }
   
    public function displayDetails()  // Method to display student details
	{
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Grade: " . $this->grade . "<br>";
    }
}

$student1 = new Student("Jil Patel", 22, "2nd");
$student1->displayDetails();

$student2 = new Student("Dhruvin Patel", 22, "3rd");
$student2->displayDetails();

?>
