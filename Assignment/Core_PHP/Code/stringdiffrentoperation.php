<?php

$string1 = "Jil";
$string2 = " Patel";

// 1. String Concatenation: Joining strings together
$concatenatedString = $string1 . $string2;
echo "Concatenation: " . $concatenatedString . "<br>";

// 2. String Length Determination: Finding the length of a string
$stringLength = strlen($concatenatedString);
echo "String Length: " . $stringLength . "<br>"; 

// 3. Substring Extraction: Getting a portion of a string
// substr(string, start, length)
$substring = substr($concatenatedString, 0, 5); 
echo "Substring (first 5 characters): " . $substring . "<br>"; 

$substring2 = substr($concatenatedString, 6); 
echo "Substring (from character 7): " . $substring2 . "<br>"; 

$substring3 = substr($concatenatedString, -6); 
echo "Substring (last 6 characters): " . $substring3 . "<br>"; 

// 4. String Replacement: Replacing parts of a string
$originalString = "The quick brown fox jumps over the lazy dog.";
$newString = str_replace("fox", "Jil", $originalString);
echo "String Replacement: " . $newString . "<br>"; 

// 5. String Case Conversion: Changing the case of a string
$lowercaseString = strtolower($concatenatedString);
echo "Lowercase: " . $lowercaseString . "<br>"; 

$uppercaseString = strtoupper($concatenatedString);
echo "Uppercase: " . $uppercaseString . "<br>"; 

// 6. Trimming Whitespace: Removing leading and trailing spaces
$stringWithSpaces = "   Trim me!   ";
$trimmedString = trim($stringWithSpaces);
echo "Trimmed String: '" . $trimmedString . "'<br>"; 

// 7. String Splitting: Breaking a string into an array
$stringToSplit = "apple,banana,orange";
$stringArray = explode(",", $stringToSplit);
echo "String Split into Array: ";
print_r($stringArray); 
echo "<br>";

// 8. String Formatting: Formatting a string with sprintf
$number = 123.4567;
$formattedString = sprintf("The number is: %.2f", $number); 
echo "Formatted String: " . $formattedString . "<br>"; 

?>
