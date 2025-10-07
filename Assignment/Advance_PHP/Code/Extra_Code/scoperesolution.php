<?php
class InstanceCounter 
{  
    private static $count = 0; // static property to keep track of instances
  
    public function __construct()  // constructor increments the count whenever a new object is created
	{
        self::$count++; // Access static property using self::
        echo "A new instance has been created! Total instances: " . self::$count . "<br>";
    }
   
    public static function getCount() // Static method to get the current count
	{ 
        return self::$count;
    }
}

$obj1 = new InstanceCounter();
$obj2 = new InstanceCounter();
$obj3 = new InstanceCounter();

echo "Total instances created (accessed via class): " . InstanceCounter::getCount() . "<br>"; // Access static method using the scope resolution operator ::
?>
