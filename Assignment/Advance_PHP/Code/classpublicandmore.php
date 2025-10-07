<?php
class Dog 
{
    private $name;
    private $breed;
    public $age;

    public function __construct($name, $breed, $age) 
	{
        $this->name = $name;
        $this->breed = $breed;
        $this->age = $age;
    }

    public function getName() 
	{
        return $this->name;
    }

    public function getBreed() 
	{
        return $this->breed;
    }

    public function setAge($age) 
	{
        if ($age >= 0) 
		{
            $this->age = $age;
        } else 
		{
            echo "Age cannot be negative.<br>";
        }
    }

    public function bark() 
	{
        echo "Woof! My name is " . $this->name . ".<br>";
    }
}

$dog = new Dog("Buddy", "Golden Retriever", 3);

echo $dog->getName() . " is a " . $dog->getBreed() . ".<br>";
echo "He is " . $dog->age . " years old.<br>";
$dog->bark();
$dog->setAge(-1);
$dog->setAge(4);
echo "He is now " . $dog->age . " years old.<br>";
?>
