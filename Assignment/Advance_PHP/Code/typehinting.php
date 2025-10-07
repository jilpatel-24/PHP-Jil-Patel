<?php

class DataProcessor 
{

    public function processData(int $number, string $text, array $items, bool $flag, ?object $object = null): string {
        $result = "Processing Data:\n";
        $result .= "- Number: " . $number . "\n";
        $result .= "- Text: " . $text . "\n";
        $result .= "- Items: " . implode(", ", $items) . "\n";
        $result .= "- Flag: " . ($flag ? "true" : "false") . "\n";
        $result .= "- Object: " . ($object ? get_class($object) : "null") . "\n";

        return $result;
    }
}

// Example Usage:
$processor = new DataProcessor();

// Example 1: Using valid data types
$result1 = $processor->processData(123, "Hello, Aria!", [1, "two", true], true);
echo $result1 . "<br>";

// Example 2: Using different data types
$result2 = $processor->processData(42, "World", ["a", "b", "c"], false);
echo $result2 . "<br>";

// Example 3: Using an object (you'll need a class definition for this to work)
class MyObject {}
$object = new MyObject();
$result3 = $processor->processData(10, "Object Example", ["x", "y"], true, $object);
echo $result3 . "<br>";

// Example 4: Using null
$result4 = $processor->processData(0, "Null Example", [], false, null);
echo $result4 . "<br>";

// Example 5: Attempting to pass an invalid data type (will result in a TypeError)
// $result5 = $processor->processData("not a number", "text", [1, 2], true); // This will throw an error
// echo $result5 . "<br>";

?>
