<?php
class DynamicProperties 
{
    private $data = [];  // Private array to store dynamic properties

    public function __set($name, $value) // Magic method to set a property dynamically
	{
        $this->data[$name] = $value;
        echo "Property '$name' set to '$value'.<br>";
    }
    
    public function __get($name)  // Magic method to get a property dynamically
	{
        if (isset($this->data[$name])) 
		{
            echo "Accessing property '$name': " . $this->data[$name] . "<br>";
            return $this->data[$name];
        }
		else 
		{
            echo "Property '$name' does not exist.<br>";
            return null;
        }
    }

    public function __isset($name)  // Optional: Check if property exists
	{
        return isset($this->data[$name]);
    }
   
    public function __unset($name)  // Optional: Remove a dynamic property
	{
        if (isset($this->data[$name])) 
		{
            unset($this->data[$name]);
            echo "Property '$name' has been removed.<br>";
        }
    }
}

$user = new DynamicProperties();

$user->name = "Jil";  // Dynamically set properties
$user->age = 23;
$user->email = "jil@gmail.com";

echo $user->name . "<br>"; // Dynamically access properties
echo $user->age . "<br>";

if (isset($user->email))  //isset is check if property exists
{
    echo "Email exists: " . $user->email . "<br>";
}

unset($user->age); // Remove a property

echo $user->age . "<br>"; // Try accessing a removed property
?>