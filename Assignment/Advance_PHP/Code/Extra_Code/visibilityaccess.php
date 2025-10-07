<?php

class Account {
    public $username;
    private $password;
    protected $accountBalance;

    public function __construct($username, $password, $accountBalance) 
	{
        $this->username = $username;
        $this->password = $password;
        $this->accountBalance = $accountBalance;
    }

    public function getPassword() 
	{
        return $this->password;
    }

    public function setPassword($password) 
	{
        $this->password = $password;
    }

    public function getAccountBalance() 
	{
        return $this->accountBalance;
    }

    public function setAccountBalance($accountBalance) 
	{
        $this->accountBalance = $accountBalance;
    }
}

class SavingsAccount extends Account 
{
    public function displayAccountInfo() 
	{
        echo "Username: " . $this->username . "<br>";
        // echo "Password: " . $this->password . "<br>"; // This will cause an error
        echo "Account Balance: " . $this->accountBalance . "<br>";
    }
}

// Example Usage
$account = new Account("Jil Patel", "secret123", 1000);
echo "Username: " . $account->username . "<br>";
// echo "Password: " . $account->password . "<br>"; // This will cause an error
// echo "Account Balance: " . $account->accountBalance . "<br>"; // This will cause an error

$savingsAccount = new SavingsAccount("Jil Patel", "securePass", 5000);
$savingsAccount->displayAccountInfo();
// Accessing protected property using getter and setter from base class
echo "Current Balance: " . $savingsAccount->getAccountBalance() . "<br>";
$savingsAccount->setAccountBalance(6000);
echo "Updated Balance: " . $savingsAccount->getAccountBalance() . "<br>";

?>
