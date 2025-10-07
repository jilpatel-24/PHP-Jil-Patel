<?php
class Person 
{
    private $data = [];  // Private array to hold property values dynamically
   
    public function __set($name, $value)  // Magic method to set property values
	{
        echo "Setting '$name' to '$value'<br>";
        $this->data[$name] = $value;
    }
   
    public function __get($name)  // Magic method to get property values
	{
        if (array_key_exists($name, $this->data)) 
		{
            echo "Accessing '$name' => " . $this->data[$name] . "<br>";
            return $this->data[$name];
        } 
		else 
		{
            echo "Property '$name' not found.<br>";
            return null;
        }
    }
   
    public function __isset($name)   // Magic method to check if a property is set
	{
        return isset($this->data[$name]);
    }
   
    public function __unset($name)  // Magic method to unset (delete) a property
	{
        if (isset($this->data[$name])) 
		{
            unset($this->data[$name]);
            echo "Property '$name' has been unset.<br>";
        }
    }
}

$person = new Person();

$person->name = "JIL PATEL";  // Dynamically set properties
$person->age = 23;
$person->city = "Ahmedabad";

echo $person->name . "<br>";  // Dynamically get properties
echo $person->age . "<br>";

if (isset($person->city))  //isset is Check if property exists
{
    echo "City is set.<br>";
}

unset($person->city);  // Unset a property

echo $person->city;  // Try accessing an unset property
?>
