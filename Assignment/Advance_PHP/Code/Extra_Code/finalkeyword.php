<?php

class Animal 
{
    public $name;

    public function __construct($name) 
	{
        $this->name = $name;
    }

    public function makeSound() 
	{
        echo "Generic animal sound<br>";
    }
}

final class Dog extends Animal  // Final class Dog
{
    public function makeSound() 
	{
        echo "Woof!<br>";
    }
}

// Creating instances to demonstrate
$animal = new Animal("Generic Animal");
$animal->makeSound(); // Output: Generic animal sound

$dog = new Dog("Buddy");
$dog->makeSound(); // Output: Woof!

?>