<?php
function reverseString($string) 
{
  $reversedString = "";
  $length = strlen($string);

  for ($i = $length - 1; $i >= 0; $i--) 
  {
    $reversedString .= $string[$i];
  }

  return $reversedString;
}

$originalString = "JIL PATEL";
$reversed = reverseString($originalString);
echo $reversed;
?>
