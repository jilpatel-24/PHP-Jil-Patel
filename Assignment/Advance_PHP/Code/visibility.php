<?php
class VisibilityExample 
{
    public $publicProperty = 'Public'; // Public: Accessible from anywhere
    protected $protectedProperty = 'Protected'; // Protected: Accessible within the class and its subclasses
    private $privateProperty = 'Private'; // Private: Accessible only within the class

    public function publicMethod() 
	{
        echo "Public method called.<br>";
        echo "Public Property: " . $this->publicProperty . "<br>";
        echo "Protected Property: " . $this->protectedProperty . "<br>";
        echo "Private Property: " . $this->privateProperty . "<br>";
    }

    protected function protectedMethod() 
	{
        echo "Protected method called.<br>";
    }

    private function privateMethod() 
	{
        echo "Private method called.<br>";
    }
}

$example = new VisibilityExample();

echo $example->publicProperty . "<br>"; // accessing public members
$example->publicMethod();


class Subclass extends VisibilityExample  // Accessing protected members (from within a subclass)
{
    public function accessProtected() 
	{
        echo "Protected Property (from subclass): " . $this->protectedProperty . "<br>";
        $this->protectedMethod();
    }
}

$subclass = new Subclass();
$subclass->accessProtected();

// Attempting to access protected members directly (will result in an error)
// echo $example->protectedProperty; // Error: Cannot access protected property
// $example->protectedMethod(); // Error: Cannot access protected method

// Attempting to access private members directly (will result in an error)
// echo $example->privateProperty; // Error: Cannot access private property
// $example->privateMethod(); // Error: Cannot access private method
?>
