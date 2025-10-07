<?php
class Car 
{
    public $make;
    public $model;
    public $year;
    
    public function __construct($make, $model, $year)  // Constructor to initialize car details
	{
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function displayDetails()  // Method to display car details
	{
        echo "Car Details:<br>";
        echo "Make: " . $this->make . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br><br>";
    }
}

$car1 = new Car("Honda", "Activa", 2020); // Create multiple Car objects
$car2 = new Car("Maruti", "Swift", 2022);
$car3 = new Car("Hyundai", "Creta", 2023);

$car1->displayDetails(); // Access their methods to display details
$car2->displayDetails();
$car3->displayDetails();
?>
