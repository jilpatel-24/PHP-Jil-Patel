<?php
function isPalindrome($str) 
{
  
  $str = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($str));


  return $str === strrev($str);
}

$string1 = "madam";
$string2 = "JIL Patel!";
$string3 = "hello";

echo "'$string1' is palindrome: " . (isPalindrome($string1) ? 'Yes' : 'No') . "<br>"; 
echo "'$string2' is palindrome: " . (isPalindrome($string2) ? 'Yes' : 'No') . "<br>"; 
echo "'$string3' is palindrome: " . (isPalindrome($string3) ? 'Yes' : 'No') . "<br>"; 
?>
