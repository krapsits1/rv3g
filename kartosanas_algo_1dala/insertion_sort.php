<?php

    //insertion sort
    function insertion_sort($masivs){
        $n = count($masivs);
        for($i=1;$i<$n;$i++){
            $key = $masivs[$i];
            $j = $i-1;
            while($j>=0 && $masivs[$j]>$key){
                $masivs[$j+1] = $masivs[$j];
                $j = $j-1;
            }
            $masivs[$j+1] = $key;
        }
        return $masivs;
    }
?>