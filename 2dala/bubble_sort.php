<?php

    
function bubble_sort($masivs1){
    $n = count($masivs1);
    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n-1; $j++){
            if($masivs1[$j] > $masivs1[$j+1]){
                $temp = $masivs1[$j];
                $masivs1[$j] = $masivs1[$j+1];
                $masivs1[$j+1] = $temp;
            }
        }
    }
    return $masivs1;    
}

?>