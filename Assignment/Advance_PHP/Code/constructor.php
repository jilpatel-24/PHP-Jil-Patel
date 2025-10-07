<?php
class Car 
{
    public $model;
    public $color;
    public $year;

    public function __construct($model, $color, $year)   // Constructor
	{
        $this->model = $model;  // Initialize model
        $this->color = $color;  // Initialize color
        $this->year = $year;    // Initialize year
    }

    public function displayDetails()      // Method to display car details
	{
        echo "Car Model: " . $this->model . "<br>";
        echo "Car Color: " . $this->color . "<br>";
        echo "Car Year: " . $this->year . "<br>";
    }
}

$myCar = new Car("Toyota Fortuner", "Black", 2023);

$myCar->displayDetails(); // displaying the detail
?>
