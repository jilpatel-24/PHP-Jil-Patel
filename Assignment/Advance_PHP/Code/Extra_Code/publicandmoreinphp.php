<?php

// Product Class
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $category;

    public function __construct($id, $name, $description, $price, Category $category) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getCategory() { return $this->category; }
}

// Category Class
class Category {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
}

// Order Class
class Order {
    private $id;
    private $customerName;
    private $orderDate;
    private $products = [];

    public function __construct($id, $customerName) {
        $this->id = $id;
        $this->customerName = $customerName;
        $this->orderDate = date('Y-m-d');
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getId() { return $this->id; }
    public function getCustomerName() { return $this->customerName; }
    public function getOrderDate() { return $this->orderDate; }
    public function getProducts() { return $this->products; }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}

// Example Usage
$category = new Category(1, 'Electronics');
$product1 = new Product(1, 'Laptop', 'High-performance laptop', 1200, $category);
$product2 = new Product(2, 'Tablet', 'Lightweight tablet', 300, $category);

$order = new Order(1, 'Jil Patel');
$order->addProduct($product1);
$order->addProduct($product2);

echo "Order ID: " . $order->getId() . "<br>";
echo "Customer: " . $order->getCustomerName() . "<br>";
echo "Order Date: " . $order->getOrderDate() . "<br>";
echo "Total Price: Rupees " . $order->getTotalPrice() . "<br>";

echo "Products in the order:<br>";
foreach ($order->getProducts() as $product) {
    echo "- " . $product->getName() . " ($" . $product->getPrice() . ")<br>";
}

?>
