<?php
class Employee 
{
    protected $name;
    protected $salary;

    public function __construct($name, $salary) 
	{
        $this->name = $name;
        $this->salary = $salary;
    }
   
    public function displayEmployee()  // Display employee details
	{
        echo "Name: " . $this->name . "<br>";
        echo "Salary:" . $this->salary . "<br>";
    }
}

class FullTimeEmployee extends Employee  // Subclass: Full-time employee
{
    public function calculateBonus()   // Calculate yearly bonus (e.g., 20% of salary)
	{
        return $this->salary * 0.2;
    }

    public function displayEmployee()   // Override display to include bonus
	{
        parent::displayEmployee();
        echo "Full-Time Bonus:" . $this->calculateBonus() . "<br><br>";
    }
}

class PartTimeEmployee extends Employee  // Subclass: Part-time employee
{
    private $hoursWorked;

    public function __construct($name, $salary, $hoursWorked) 
	{
        parent::__construct($name, $salary);
        $this->hoursWorked = $hoursWorked;
    }
    
    public function calculateBonus()  // Calculate bonus based on hours worked
	{
        return $this->hoursWorked * 10;
    }
   
    public function displayEmployee()  // Override display to include bonus
	{
        parent::displayEmployee();
        echo "Part-Time Bonus:" . $this->calculateBonus() . "<br><br>";
    }
}

$emp1 = new FullTimeEmployee("Jil", 5000);
$emp2 = new PartTimeEmployee("Dhruvin", 2000, 80);

$emp1->displayEmployee();
$emp2->displayEmployee();
?>
