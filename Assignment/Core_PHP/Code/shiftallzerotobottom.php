<?php
// Sample array with zero values
$originalArray = array(1, 0, 2, 0, 3, 4, 0, 5);

// Function to shift zeros to the end of the array
function shiftZerosToEnd($array) {
    // Initialize a new array for non-zero elements
    $result = array();
    // Count of zeros
    $zeroCount = 0;

    // Loop through the original array
    foreach ($array as $value) 
	{
        if ($value === 0) 
		{
            $zeroCount++; // Increment zero count
        } 
		else 
		{
            $result[] = $value; // Add non-zero elements to result
        }
    }

    // Append zeros to the end of the result array
    for ($i = 0; $i < $zeroCount; $i++) 
	{
        $result[] = 0; // Add zero to the end
    }

    return $result; // Return the modified array
}

// Call the function and display the result
$shiftedArray = shiftZerosToEnd($originalArray);
echo "Original Array: ";
print_r($originalArray);
echo "<br>Array after shifting zeros: ";
print_r($shiftedArray);
?>
