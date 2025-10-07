<?php

class Order 
{

    public function calculateTotal(array $products): float 
	{
        $total = 0.0; // Initialize the total amount

        foreach ($products as $product) 
		{
            // Assuming each product has a method to get its price (e.g., getPrice())
            $total += $product->getPrice();
        }

        return $total;
    }
}

// Example usage (assuming you have a Product class)
class Product 
{
    private float $price;

    public function __construct(float $price) 
	{
        $this->price = $price;
    }

    public function getPrice(): float 
	{
        return $this->price;
    }
}

// Create some product instances
$product1 = new Product(10.00);
$product2 = new Product(25.50);
$product3 = new Product(5.75);

// Create an array of products
$orderProducts = [$product1, $product2, $product3];

// Create an Order instance
$order = new Order();

// Calculate the total
$totalAmount = $order->calculateTotal($orderProducts);

// Output the total
echo "Total order amount: Rupees " . $totalAmount; // Output: Total order amount: $41.25

?>
