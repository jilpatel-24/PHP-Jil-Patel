<?php

class Book 
{
    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price)  // Constructor
	{
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function applyDiscount($discountPercentage)   // Method to apply a discount
	{       
        $discountAmount = ($this->price * $discountPercentage) / 100;  // calculate the discount amount
       
        $newPrice = $this->price - $discountAmount;  // calculate the new price after discount
        
        return $newPrice; // return the new price
    }
}

$myBook = new Book("The Hitchhiker's Guide to the Galaxy", "Douglas Adams", 2500);

$discountedPrice = $myBook->applyDiscount(25); // Apply a 25% discount

echo "Book Title: " . $myBook->title . "<br>";
echo "Author: " . $myBook->author . "<br>";
echo "Original Price: Rupees" . $myBook->price . "<br>";
echo "Discounted Price: Rupees" . $discountedPrice . "<br>";

?>
