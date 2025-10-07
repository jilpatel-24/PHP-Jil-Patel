<?php

// Interface for Borrowable
interface Borrowable {
    public function borrowBook(Book $book);
    public function returnBook(Book $book);
}

// Book Class
class Book {
    private $title;
    private $author;
    private $isbn;
    private $isBorrowed;

    public function __construct(string $title, string $author, string $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isBorrowed = false;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getIsbn(): string {
        return $this->isbn;
    }

    public function getIsBorrowed(): bool {
        return $this->isBorrowed;
    }

    public function setIsBorrowed(bool $isBorrowed): void {
        $this->isBorrowed = $isBorrowed;
    }

    public function __toString(): string {
        return "Title: {$this->title}, Author: {$this->author}, ISBN: {$this->isbn}";
    }
}

// Member Class
class Member implements Borrowable {
    private $memberId;
    private $name;
    private $borrowedBooks = [];

    public function __construct(string $memberId, string $name) {
        $this->memberId = $memberId;
        $this->name = $name;
    }

    public function getMemberId(): string {
        return $this->memberId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function borrowBook(Book $book): void {
        if (!$book->getIsBorrowed()) {
            $this->borrowedBooks[] = $book;
            $book->setIsBorrowed(true);
            echo "{$this->name} borrowed '{$book->getTitle()}'\n";
        } else {
            echo "'{$book->getTitle()}' is already borrowed.\n";
        }
    }

    public function returnBook(Book $book): void {
        $key = array_search($book, $this->borrowedBooks, true);
        if ($key !== false) {
            unset($this->borrowedBooks[$key]);
            $book->setIsBorrowed(false);
            echo "{$this->name} returned '{$book->getTitle()}'\n";
        } else {
            echo "{$this->name} did not borrow '{$book->getTitle()}'\n";
        }
    }

    public function getBorrowedBooks(): array {
        return $this->borrowedBooks;
    }
}

// StudentMember Class (Inherits from Member)
class StudentMember extends Member {
    private $studentId;

    public function __construct(string $memberId, string $name, string $studentId) {
        parent::__construct($memberId, $name);
        $this->studentId = $studentId;
    }

    public function getStudentId(): string {
        return $this->studentId;
    }
}

// Library Class
class Library {
    private $books = [];
    private $members = [];

    public function addBook(Book $book): void {
        $this->books[] = $book;
        echo "'{$book->getTitle()}' added to the library.\n";
    }

    public function addMember(Member $member): void {
        $this->members[] = $member;
        echo "{$member->getName()} added as a member.\n";
    }

    public function findBookByIsbn(string $isbn): ?Book {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $isbn) {
                return $book;
            }
        }
        return null; // Book not found
    }

    public function findMemberById(string $memberId): ?Member {
        foreach ($this->members as $member) {
            if ($member->getMemberId() === $memberId) {
                return $member;
            }
        }
        return null; // Member not found
    }
}

// Example Usage
$library = new Library();

// Add Books
$book1 = new Book("The Lord of the Rings", "J.R.R. Tolkien", "978-0618260264");
$book2 = new Book("Pride and Prejudice", "Jane Austen", "978-0141439518");
$library->addBook($book1);
$library->addBook($book2);

// Add Members
$member1 = new Member("M001", "Alice Smith");
$student1 = new StudentMember("S001", "Bob Johnson", "12345");
$library->addMember($member1);
$library->addMember($student1);

// Borrow and Return Books
$member1->borrowBook($book1);
$student1->borrowBook($book2);

// Display borrowed books for a member
echo "<br>Borrowed books for Alice Smith:<br>";
foreach ($member1->getBorrowedBooks() as $book) 
{
    echo "- " . $book . "<br>";
}

echo "<br>Borrowed books for Bob Johnson:<br>";
foreach ($student1->getBorrowedBooks() as $book) 
{
    echo "- " . $book . "<br>";
}

$member1->returnBook($book1);
?>
