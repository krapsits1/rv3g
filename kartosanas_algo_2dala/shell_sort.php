<?php
function shell_Sort(array $masivs): array {
    $n = count($masivs);
    $gap = floor($n / 2); 
    
    while ($gap > 0) {
        for ($i = $gap; $i < $n; $i++) {
            $key = $masivs[$i];
            $j = $i;

            // Shift elements that are greater than key by gap positions
            while ($j >= $gap && $masivs[$j - $gap] > $key) {
                $masivs[$j] = $masivs[$j - $gap];
                $j -= $gap;
            }

            // Place key at its correct position
            $masivs[$j] = $key;
        }

        // Reduce gap size
        $gap = floor($gap / 2);
    }

    return $masivs;
}


?>
