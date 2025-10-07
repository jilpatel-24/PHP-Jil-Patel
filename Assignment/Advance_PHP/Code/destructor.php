<?php
class MyResource {
   
    private $resource;

    
    public function __construct()  // Constructor to initialize the resource
	{
        $this->resource = 0;     // Initialize the resource (e.g., a counter)
        echo "Resource initialized.<br>";
    }

    
    public function useResource()  // Method to use the resource
	{
        $this->resource++; // Increment the resource (e.g., a counter)
        echo "Resource used. Current value: " . $this->resource . "<br>";
    }

    
    public function __destruct()  // Destructor to release or clean up the resource
	{    
        echo "Resource released. Final value: " . $this->resource . "<br>"; // Perform cleanup tasks here
    }
}

$obj = new MyResource();

$obj->useResource(); // Using the resource multiple times
$obj->useResource();
$obj->useResource();

?>
