<?php

// --- Class: User ---
class User {
    private $userId;
    private $username;
    private $password; // In a real system, this would be hashed!
    private $email;
    private $borrowedBooks = []; // Array to store books borrowed by the user

    public function __construct($userId, $username, $password, $email) {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    // Getters
    public function getUserId() { return $this->userId; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getBorrowedBooks() { return $this->borrowedBooks; }

    // Setters (Optional, depending on the needs)
    public function setUsername($username) { $this->username = $username; }
    public function setEmail($email) { $this->email = $email; }

    // Method to borrow a book
    public function borrowBook(Book $book) {
        if ($book->isAvailable()) {
            $this->borrowedBooks[] = $book;
            $book->setAvailable(false);
            echo "{$this->getUsername()} has borrowed '{$book->getTitle()}'<br>";
        } else {
            echo "Sorry, '{$book->getTitle()}' is currently unavailable.<br>";
        }
    }

    // Method to return a book
    public function returnBook(Book $book) {
        $key = array_search($book, $this->borrowedBooks, true);
        if ($key !== false) {
            unset($this->borrowedBooks[$key]);
            $book->setAvailable(true);
            echo "{$this->getUsername()} has returned '{$book->getTitle()}'<br>";
        } else {
            echo "{$this->getUsername()} did not borrow '{$book->getTitle()}'<br>";
        }
    }

    // Display user information
    public function displayUserInfo() {
        echo "User ID: {$this->getUserId()}<br>";
        echo "Username: {$this->getUsername()}<br>";
        echo "Email: {$this->getEmail()}<br>";
        echo "Borrowed Books: ";
        if (empty($this->borrowedBooks)) {
            echo "None<br>";
        } else {
            foreach ($this->borrowedBooks as $book) {
                echo "- " . $book->getTitle() . "<br>";
            }
        }
    }
}

// --- Class: Book ---
class Book {
    private $bookId;
    private $title;
    private $author;
    private $isbn;
    private $isAvailable;

    public function __construct($bookId, $title, $author, $isbn) {
        $this->bookId = $bookId;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isAvailable = true; // Initially, all books are available
    }

    // Getters
    public function getBookId() { return $this->bookId; }
    public function getTitle() { return $this->title; }
    public function getAuthor() { return $this->author; }
    public function getIsbn() { return $this->isbn; }
    public function isAvailable() { return $this->isAvailable; }

    // Setters
    public function setAvailable($isAvailable) { $this->isAvailable = $isAvailable; }

    // Display book information
    public function displayBookInfo() {
        echo "Book ID: {$this->getBookId()}<br>";
        echo "Title: {$this->getTitle()}<br>";
        echo "Author: {$this->getAuthor()}<br>";
        echo "ISBN: {$this->getIsbn()}<br>";
        echo "Availability: " . ($this->isAvailable() ? "Available" : "Borrowed") . "<br>";
    }
}

// --- Class: Transaction (Simplified) ---
class Transaction {
    private $transactionId;
    private $user;
    private $book;
    private $borrowDate;
    private $returnDate;

    public function __construct($transactionId, User $user, Book $book, $borrowDate) {
        $this->transactionId = $transactionId;
        $this->user = $user;
        $this->book = $book;
        $this->borrowDate = $borrowDate;
    }

    // Getters
    public function getTransactionId() { return $this->transactionId; }
    public function getUser() { return $this->user; }
    public function getBook() { return $this->book; }
    public function getBorrowDate() { return $this->borrowDate; }
    public function getReturnDate() { return $this->returnDate; }

    // Setters
    public function setReturnDate($returnDate) { $this->returnDate = $returnDate; }

    // Display transaction information
    public function displayTransactionInfo() {
        echo "Transaction ID: {$this->getTransactionId()}<br>";
        echo "User: " . $this->getUser()->getUsername() . "<br>";
        echo "Book: " . $this->getBook()->getTitle() . "<br>";
        echo "Borrow Date: {$this->getBorrowDate()}<br>";
        echo "Return Date: " . ($this->getReturnDate() ? $this->getReturnDate() : "Not returned") . "<br>";
    }
}

// --- Example Usage ---
// Create users
$user1 = new User(1, "JIL PATEL", "password123", "jp@gmail.com");
$user2 = new User(2, "DHRUVIN PATEL", "securePass", "dp@gmail.com");

// Create books
$book1 = new Book(101, "The Lord of the Rings", "J.R.R. Tolkien", "978-0618260200");
$book2 = new Book(102, "Pride and Prejudice", "Jane Austen", "978-0141439518");

// Display book and user information
echo "--- Book Information ---<br>";
$book1->displayBookInfo();
$book2->displayBookInfo();
echo "<br>--- User Information ---<br>";
$user1->displayUserInfo();
$user2->displayUserInfo();

// User borrows a book
echo "<br>--- Borrowing a Book ---<br>";
$user1->borrowBook($book1);
$book1->displayBookInfo();
$user1->displayUserInfo();

// User returns a book
echo "<br>--- Returning a Book ---<br>";
$user1->returnBook($book1);
$book1->displayBookInfo();
$user1->displayUserInfo();

// Create a transaction
$transaction1 = new Transaction(1, $user1, $book1, date("Y-m-d"));
echo "<br>--- Transaction Information ---<br>";
$transaction1->displayTransactionInfo();
