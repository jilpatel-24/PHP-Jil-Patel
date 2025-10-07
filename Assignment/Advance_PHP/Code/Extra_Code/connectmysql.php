<?php
class Database 
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname)    // constructor establish connection
	{
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) 
		{
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
   
    public function query($sql)  // Method to run a query
	{
        $result = $this->conn->query($sql);
        if (!$result) 
		{
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
 
    public function fetchAll($sql)  // Method to fetch all rows as associative array
	{
        $result = $this->query($sql);
        $rows = [];
        while ($row = $result->fetch_assoc()) 
		{
            $rows[] = $row;
        }
        return $rows;
    }

    public function __destruct()  // Destructor: close connection
	{
        if ($this->conn) 
		{
            $this->conn->close();
        }
    }
}
?>