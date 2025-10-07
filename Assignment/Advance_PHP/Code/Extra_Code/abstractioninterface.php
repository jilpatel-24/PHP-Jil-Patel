<?php

interface PaymentInterface  // Define the Payment Interface
{
    public function processPayment($amount);
    public function refund($amount);
}

class CreditCardPayment implements PaymentInterface  // Credit Card Payment Class
{
    private $cardNumber;

    public function __construct($cardNumber) 
	{
        $this->cardNumber = $cardNumber;
    }

    public function processPayment($amount) 
	{
        echo "Processing credit card payment of rupees$amount using card " . $this->cardNumber . ".<br>";
    }

    public function refund($amount) 
	{
        echo "Refunding rupees$amount to credit card " . $this->cardNumber . ".<br>";
    }
}

class PaypalPayment implements PaymentInterface  // PayPal Payment Class
{
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function processPayment($amount) {
        echo "Processing PayPal payment of rupees$amount for account " . $this->email . ".<br>";
    }

    public function refund($amount) {
        echo "Refunding rupees$amount to PayPal account " . $this->email . ".<br>";
    }
}

$creditPayment = new CreditCardPayment("1234-5678-9876-5432");
$paypalPayment = new PaypalPayment("jil@gmail.com");

// Process payments
$creditPayment->processPayment(100);
$paypalPayment->processPayment(50);

// Refund payments
$creditPayment->refund(25);
$paypalPayment->refund(10);
?>
