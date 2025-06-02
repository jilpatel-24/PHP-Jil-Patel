<?php

$array1 = array( "a" => "red", "b" => "green", "c" => "blue" );
$array2 = array( "b" => "green", "c" => "blue", "d" => "yellow" );

$mergedArray = array_merge( $array1, $array2 ); // Merge the arrays using array_merge

echo "<h3>Merged Array:</h3>";
print_r( $mergedArray );


$diffArray1 = array_diff( $array1, $array2 ); // Find the difference between the arrays using array_diff
echo "<h3>Difference (array1 - array2):</h3>";
print_r( $diffArray1 );

$diffArray2 = array_diff( $array2, $array1 ); // Find the difference between the arrays using array_diff
echo "<h3>Difference (array2 - array1):</h3>";
print_r( $diffArray2 );

?>
