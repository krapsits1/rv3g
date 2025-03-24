<?php  



include 'dati.php';
include 'bubble_sort.php';
include 'insertion_sort.php';

// echo json_encode(bubble_sort($masivs1));  
// echo json_encode(bubble_sort($masivs2));  

$startTime = microtime(true);

// Call the insertion_sort function
$sortedArray = insertion_sort($masivs1);

// Record the end time after function execution
$endTime = microtime(true);

$time = $endTime - $startTime; 

print_r($sortedArray);
echo "Time taken: $time seconds\n";


?>