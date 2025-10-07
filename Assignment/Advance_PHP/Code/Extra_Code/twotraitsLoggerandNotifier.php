<?php
trait Logger 
{
    public function logActivity($activity) 
	{
        echo "[LOG] " . date("Y-m-d H:i:s") . " - " . $activity . "<br>";
    }
}

trait Notifier 
{
    public function sendNotification($message) 
	{
        echo "[NOTIFICATION] " . $message . "<br>";
    }
}

class User 
{
    use Logger, Notifier; // Include both traits

    private $name;
    private $email;

    public function __construct($name, $email) 
	{
        $this->name = $name;
        $this->email = $email;
    }

    public function performAction($action) 
	{
        $this->logActivity("User '{$this->name}' performed action: $action");
        $this->sendNotification("Hello {$this->name}, your action '$action' was successful!");
    }
}

$user1 = new User("Jil", "jil@gmail.com");
$user2 = new User("Dhruvin", "dhruvin@gmail.com");

$user1->performAction("Login");
$user2->performAction("Upload File");
?>