<?php

include "dati.php";

function bisection_sort($masivs) {

    for ($i = 1; $i < count($masivs); $i++) {
        $key = $masivs[$i];
        $left = 0;
        $right = $i - 1;

        // Binārā meklēšana, lai atrastu pareizo ievietošanas vietu
        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);
            if ($masivs[$mid] > $key) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        // Pārbīdām elementus pa labi
        for ($j = $i; $j > $left; $j--) {
            $masivs[$j] = $masivs[$j - 1];
        }

        // Ievietojam elementu pareizajā vietā
        $masivs[$left] = $key;
    }

    return $masivs;
}


?>