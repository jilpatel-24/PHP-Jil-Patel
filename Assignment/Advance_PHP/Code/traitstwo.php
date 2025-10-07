<?php

trait Flyable 
{
    public function fly() 
	{
        echo "I'm flying!<br>";
    }
}

trait Swimmable 
{
    public function swim() 
	{
        echo "I'm swimming!<br>";
    }
}

class Duck 
{
    use Flyable, Swimmable;

    public function quack() 
	{
        echo "Quack!<br>";
    }
}

$duck = new Duck();
$duck->quack();
$duck->fly();
$duck->swim();

?>
