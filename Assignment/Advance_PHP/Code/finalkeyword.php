<?php

final class MyFinalClass   // Define a final class
{
    public function sayHello() 
	{
        echo "Hello from MyFinalClass!<br>";
    }
}

class MyExtendedClass extends MyFinalClass  // Attempt to extend the final class
{
    // It generate error because extend not possible for final class
}

$obj = new MyFinalClass(); // Create an instance of the final class
$obj->sayHello();

?>
