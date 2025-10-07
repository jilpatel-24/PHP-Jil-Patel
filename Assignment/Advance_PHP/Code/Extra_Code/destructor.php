<?php

class Database 
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $username, $password, $database)  // constructor establish database connection
	{
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect() 
	{
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) 
	{
        if ($this->connection) 
		{
            return $this->connection->query($sql);
        }
        return false; // Or handle the error in a more sophisticated way
    }

    public function __destruct() 
	{
        if ($this->connection) 
		{
            $this->connection->close();
        }
    }
}

// Example Usage:
$db = new Database("localhost", "root", "", "cake_shop"); // Using root user with no password

// Example query:
$result = $db->query("SELECT * FROM customer"); 

if ($result) 
{
    while ($row = $result->fetch_assoc()) 
	{
        echo "ID: " . $row["id"] . ", Name: " . $row["name"] . "<br>";
    }
    $result->free_result(); // Free the result set
} 
else 
{
    echo "Query failed: " . $db->getConnection()->error;
}

?>
