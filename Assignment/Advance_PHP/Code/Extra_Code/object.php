<?php
// Book class definition
class Book {
    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    // Apply discount and return new price
    public function applyDiscount($discountPercent) {
        if ($discountPercent < 0 || $discountPercent > 100) {
            return "Invalid discount percentage!";
        }
        $discountAmount = ($this->price * $discountPercent) / 100;
        $newPrice = $this->price - $discountAmount;
        return $newPrice;
    }

    // Display book details
    public function displayBook() {
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Price: $" . $this->price . "<br><br>";
    }
}


// Create multiple Book objects

$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", 2000);
$book2 = new Book("1984", "George Orwell", 1500);
$book3 = new Book("To Kill a Mockingbird", "Harper Lee", 1800);

$books = [$book1, $book2, $book3]; // Display each book and apply discount

echo "<h2>Library Books</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Title</th><th>Author</th><th>Original Price</th><th>Price after 15% Discount</th></tr>";

foreach ($books as $book) 
{
    $discountedPrice = $book->applyDiscount(15); // 15% discount
    echo "<tr>";
    echo "<td>" . $book->title . "</td>";
    echo "<td>" . $book->author . "</td>";
    echo "<td>" . $book->price . "</td>";
    echo "<td>" . $discountedPrice . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
