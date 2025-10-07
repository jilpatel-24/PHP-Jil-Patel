<?php

class MyClass 
{
    public static $staticProperty = "Hello, static world!";     // Static property
 
    public static function staticMethod()   // Static method
	{
        return "This is a static method.";
    }

    public static function getStaticProperty()    // Static method to access a static property from within the class
	{
        return self::$staticProperty; // Accessing static property using self::
    }
   
    public function accessStaticMembers()  // Non-static method to demonstrate access to static members
	{
        echo "Accessing static property from instance: " . self::$staticProperty . "<br>"; // Or MyClass::$staticProperty;
        echo "Calling static method from instance: " . self::staticMethod() . "<br>"; // Or MyClass::staticMethod();
    }
}

// Accessing static members using the scope resolution operator (::)


echo MyClass::$staticProperty . "<br>"; // Accessing a static property. Output: Hello, static world!

echo MyClass::staticMethod() . "<br>"; // Calling a static method. Output: This is a static method.

echo MyClass::getStaticProperty() . "<br>"; //Calling a static method that accesses a static property. Output: Hello, static world!

$obj = new MyClass();

$obj->accessStaticMembers();  // Accessing static members from an instance 
 
?>
