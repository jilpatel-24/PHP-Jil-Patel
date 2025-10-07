<?php
class Car 
{
    private $make;
    private $model;
    private $year;

    public function __construct($make, $model, $year) 
	{
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function displayDetails() 
	{
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}

$myCar = new Car("Toyota", "Fortuner", 2024); // Create a Car object

$myCar->displayDetails(); // Display the car details
?>
