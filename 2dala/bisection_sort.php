<?php

// Function to perform shell sort on the given array
function shell_Sort($my_array)
{
	// Initialize the gap size
	$x = round(count($my_array) / 2);
	
	// Loop until the gap size becomes 0
	while ($x > 0)
	{
		// Traverse through the array elements with the current gap
		for ($i = $x; $i < count($my_array); $i++)
		{
			// Store the current element in a temporary variable
			$temp = $my_array[$i];
			$j = $i;
			
			// Move elements of the array that are greater than temp by an interval of gap size
			// to positions ahead of their current position
			while ($j >= $x && $my_array[$j - $x] > $temp)
			{
				$my_array[$j] = $my_array[$j - $x];
				$j -= $x;
			}
			
			// Insert the temporary variable (stored element) at its correct position
			$my_array[$j] = $temp;
		}
		
		// Reduce the gap size for the next iteration
		$x = round($x / 2.2);
	}
	
	// Return the sorted array
	return $my_array;
}

?>