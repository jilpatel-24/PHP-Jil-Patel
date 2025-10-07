<?php

interface VehicleInterface  // Define the VehicleInterface
{
    public function start();
    public function stop();
    public function accelerate($speed); // Added accelerate method
}

class Car implements VehicleInterface  // Implement the interface in a Car class
{
    public function start() 
	{
        return "Car engine started.";
    }

    public function stop() 
	{
        return "Car engine stopped.";
    }

    public function accelerate($speed) 
	{
        return "Car accelerating to " . $speed . " km/h.";
    }
}

class Motorcycle implements VehicleInterface  // Implement the interface in a Motorcycle class
{
    public function start() 
	{
        return "Motorcycle engine started.";
    }

    public function stop() 
	{
        return "Motorcycle engine stopped.";
    }

    public function accelerate($speed) 
	{
        return "Motorcycle accelerating to " . $speed . " km/h.";
    }
}

$myCar = new Car();
echo $myCar->start() . "<br>";
echo $myCar->accelerate(60) . "<br>";
echo $myCar->stop() . "<br>";

$myMotorcycle = new Motorcycle();
echo $myMotorcycle->start() . "<br>";
echo $myMotorcycle->accelerate(80) . "<br>";
echo $myMotorcycle->stop() . "<br>";

?>
