<?php

// Base class: Vehicle
class Vehicle 
{
    protected $make;
    protected $model;

    public function __construct($make, $model) 
	{
        $this->make = $make;
        $this->model = $model;
    }

    public function getMake() 
	{
        return $this->make;
    }

    public function getModel() 
	{
        return $this->model;
    }

    public function displayVehicleInfo() 
	{
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
    }
}

class Car extends Vehicle  // Derived class: Car (inherits from Vehicle)
{
    private $year;
    private $numDoors;

    public function __construct($make, $model, $year, $numDoors) 
	{
        parent::__construct($make, $model); // Call the parent constructor
        $this->year = $year;
        $this->numDoors = $numDoors;
    }

    public function getYear() 
	{
        return $this->year;
    }

    public function getNumDoors() 
	{
        return $this->numDoors;
    }

    // Override the displayVehicleInfo method
    public function displayCarInfo() 
	{
        $this->displayVehicleInfo(); // Call the parent method
        echo "Year: " . $this->year . "<br>";
        echo "Number of Doors: " . $this->numDoors . "<br>";
    }
}

// Create a Car object
$myCar = new Car("Toyota", "Camry", 2023, 4);

// Accessing methods and properties
echo "Car Details:<br>";
$myCar->displayCarInfo();
echo "<br>";

echo "Make: " . $myCar->getMake() . "<br>"; // Inherited from Vehicle
echo "Model: " . $myCar->getModel() . "<br>"; // Inherited from Vehicle
echo "Year: " . $myCar->getYear() . "<br>";
echo "Number of Doors: " . $myCar->getNumDoors() . "<br>";
?>
