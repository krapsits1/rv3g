<?php

    //bubble sort
    function bubble_sort($masivs){
        $n = count($masivs);
        for($i=0;$i<$n;$i++){
            for($j=0;$j<$n-1;$j++){
                if($masivs[$j]>$masivs[$j+1]){
                    $temp = $masivs[$j];
                    $masivs[$j] = $masivs[$j+1];
                    $masivs[$j+1] = $temp;
                }
            }
        }
        return $masivs;
    }

?>